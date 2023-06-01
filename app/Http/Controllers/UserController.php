<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caja;
use App\Models\Asignacion;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function getUsuarios(Request $request){
        try {
            if($request->tipo_usuario == 1){
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->get();
            }else{
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->where('casa_justicia_id', $request->sede)
                                ->get();
            }
            // $usuarios = User::all();
           

            $array_usuarios = array();
            $cont = 1;
            foreach ($usuarios as $usuario) {
                $objectUsuario = new \stdClass();
                $objectUsuario->id = $usuario->id;
                $objectUsuario->numero_registro = $cont;
                $objectUsuario->username = $usuario->username;
                $objectUsuario->nombre = $usuario->nombre;
                $objectUsuario->apellido_paterno = $usuario->apellido_paterno;
                $objectUsuario->apellido_materno = $usuario->apellido_materno;
                $objectUsuario->nombrecompleto = $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
                $objectUsuario->password = $usuario->password;
                $objectUsuario->sede = $usuario->casaJusticia->nombre;
                $objectUsuario->sede_id = $usuario->casa_justicia_id;
                $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                $objectUsuario->email = $usuario->email;
                if($usuario->caja){
                    $objectUsuario->ventanilla = $usuario->caja->nombre;
                }else{
                    $objectUsuario->ventanilla = 'SIN VENTANILLA';
                }
                
                // $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                // $objectUsuario->tipo_usuario = $usuario->tipoUsuario->nombre;
                // $objectUsuario->area_id = $usuario->area_id;
                // $objectUsuario->area = $usuario->areas->nombre;
                
                array_push($array_usuarios, $objectUsuario);
                $cont++;
            }

            return response()->json([
                "status" => "ok",
                "message" => "Usuarios obtenidos con exito",
                "usuarios" => $array_usuarios
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener el catalogo de usuarios",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
    public function guardarUsuario(Request $request)
    {
        $exito = false;

        DB::beginTransaction();
        try {
            
                $usuario = new User;
                $usuario->nombre = $request->nombre;
                $usuario->apellido_paterno = $request->apellido_paterno;
                $usuario->apellido_materno = $request->apellido_materno;
                $usuario->email = $request->email;
                $usuario->username = $request->username;
                $usuario->password = $request->password;
                //Superadmin
                if($request->tipo_usuario == 1){
                    $usuario->tipo_usuario_id = $request->tipo_usuario_id;
                    if($request->tipo_usuario_id == 2){
                        $usuario->tipo_usuario = 'Administrador';
                    }else{
                        $usuario->tipo_usuario = 'ventanilla';
                    }
                }//Administrador
                else{
                    $usuario->tipo_usuario = 'ventanilla';
                    $usuario->tipo_usuario_id = $request->tipo_usuario_id;
                }
               
                $usuario->caja_id = $request->caja_id;
                $usuario->casa_justicia_id = $request->sede;
                $usuario->save();

                if($request->caja_id)
                {
                    $caja = Caja::find($request->caja_id);
                    $caja->status = true;
                    $caja->save();

                    $id2 = $caja->user->asignacion;
                    if($id2)
                    {
                        $id2->user_id = $usuario->id;
                        $id2->status = true;
                        $id2->save();
                    
                    }else{

                        $asignacion = new Asignacion;
                        $asignacion->user_id = $usuario->id;
                        $asignacion->casa_justicia_id = $request->sede;
                        $asignacion->tipo_turno = $caja->tipo_turno_id;
                        $asignacion->save();
                    }
                }

            // }
            
            
            if($request->tipo_usuario == 1){
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->get();
            }else{
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->where('casa_justicia_id', $request->sede)
                                ->get();
            }

            ////////// $usuarios = User::where('status', 1)->get();

            $array_usuarios = array();
            $cont = 1;
            foreach ($usuarios as $usuario) {
                $objectUsuario = new \stdClass();
                $objectUsuario->id = $usuario->id;
                $objectUsuario->numero_registro = $cont;
                $objectUsuario->username = $usuario->username;
                $objectUsuario->nombre = $usuario->nombre;
                $objectUsuario->apellido_paterno = $usuario->apellido_paterno;
                $objectUsuario->apellido_materno = $usuario->apellido_materno;
                $objectUsuario->nombrecompleto = $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
                $objectUsuario->password = $usuario->password;
                $objectUsuario->sede = $usuario->casaJusticia->nombre;
                $objectUsuario->sede_id = $usuario->casa_justicia_id;
                $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                $objectUsuario->email = $usuario->email;
                if($usuario->caja){
                    $objectUsuario->ventanilla = $usuario->caja->nombre;
                }else{
                    $objectUsuario->ventanilla = 'SIN VENTANILLA';
                }
                // $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                // $objectUsuario->tipo_usuario = $usuario->tipoUsuario->nombre;
                // $objectUsuario->area_id = $usuario->area_id;
                // $objectUsuario->area = $usuario->areas->nombre;
                
                array_push($array_usuarios, $objectUsuario);
                $cont++;
            }


            DB::commit();
            $exito = true;
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar al nuevo usuario.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Nuevo Usuario guardado con exito.",
                "usuarios" => $array_usuarios
            ], 200);
        }
    }
    public function actualizarUsuario(Request $request)
    {
        $exito = false;

        DB::beginTransaction();
        try {
            $usuario = User::find($request->id);
            $usuario->nombre = $request->nombre;
            $usuario->apellido_paterno = $request->apellido_paterno;
            $usuario->apellido_materno = $request->apellido_materno;
            // $usuario->tipo_usuario_id = $request->tipo_usuario_id;
            $usuario->casa_justicia_id = $request->sede;
            $usuario->email = $request->email;
            $usuario->username = $request->username;
            $usuario->password = $request->password;
            // $usuario->numero = $request->numero;
            if($request->tipo_usuario == 1){
                $usuario->tipo_usuario_id = $request->tipo_usuario_id;
                if($request->tipo_usuario_id == 2){
                    $usuario->tipo_usuario = 'Administrador';
                }else{
                    $usuario->tipo_usuario = 'ventanilla';
                }
            }//Administrador
            else{
                $usuario->tipo_usuario = 'ventanilla';
                $usuario->tipo_usuario_id = $request->tipo_usuario_id;
            }
            
            if($request->caja_id)
            {
                $caja_anterior = $usuario->caja_id;
                if($caja_anterior){
                    $usuario->caja_id = $request->caja_id;
                    $caja = Caja::find($caja_anterior);
                    $caja->status = false;
                    $caja->save();

                    $id = $caja->user->asignacion;
                    $id->user_id = null;
                    $id->status = false;
                    $id->save();

                    $nuevacaja = Caja::find($request->caja_id);
                    $nuevacaja->status = true;
                    $nuevacaja->save();
    
                    $id2 = $nuevacaja->user->asignacion;
                    if($id2)
                    {
                        $id2->user_id = $request->id;
                        $id2->status = true;
                        $id2->save();
                    }else{
                        $asignacion = new Asignacion;
                        $asignacion->user_id = $request->id;
                        $asignacion->casa_justicia_id = $request->sede;
                        $asignacion->tipo_turno = $nuevacaja->tipo_turno_id;
                        $asignacion->save();
                    }
                }else{
                    $usuario->caja_id = $request->caja_id;
                    $nuevacaja = Caja::find($request->caja_id);
                    $nuevacaja->status = true;
                    $nuevacaja->save();
    
                    $id2 = $nuevacaja->user->asignacion;
                    if($id2)
                    {
                        $id2->user_id = $request->id;
                        $id2->status = true;
                        $id2->save();
                    }else{
                        $asignacion = new Asignacion;
                        $asignacion->user_id = $request->id;
                        $asignacion->casa_justicia_id = $request->sede;
                        $asignacion->tipo_turno = $nuevacaja->tipo_turno_id;
                        $asignacion->save();
                    }

                }
                
                

                // $asignacion = Asignacion::where('user_id' , $request->id)->where('status' , 1)->get();
                // $asignacion->status = false;
                // $asignacion->save();
               

               
                
                
                }
            
            $usuario->save();
            

            if($request->tipo_usuario == 1){
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->get();
            }else{
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->where('casa_justicia_id', $request->sede)
                                ->get();
            }
            
            // $usuarios = User::where('status', 1)->get();

            $array_usuarios = array();
            $cont = 1;
            foreach ($usuarios as $usuario) {
                $objectUsuario = new \stdClass();
                $objectUsuario->id = $usuario->id;
                $objectUsuario->numero_registro = $cont;
                $objectUsuario->username = $usuario->username;
                $objectUsuario->nombre = $usuario->nombre;
                $objectUsuario->apellido_paterno = $usuario->apellido_paterno;
                $objectUsuario->apellido_materno = $usuario->apellido_materno;
                $objectUsuario->nombrecompleto = $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
                $objectUsuario->password = $usuario->password;
                $objectUsuario->sede = $usuario->casaJusticia->nombre;
                $objectUsuario->sede_id = $usuario->casa_justicia_id;
                $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                $objectUsuario->email = $usuario->email;
                if($usuario->caja){
                    $objectUsuario->ventanilla = $usuario->caja->nombre;
                }else{
                    $objectUsuario->ventanilla = 'SIN VENTANILLA';
                }
                // $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                // $objectUsuario->tipo_usuario = $usuario->tipoUsuario->nombre;
                // $objectUsuario->area_id = $usuario->area_id;
                // $objectUsuario->area = $usuario->areas->nombre;
                
                array_push($array_usuarios, $objectUsuario);
                $cont++;
            }
            
            DB::commit();
            $exito = true;
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar los datos del usuario.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Usuario actualizado con exito.",
                "usuarios" => $array_usuarios
            ], 200);
        }
    }
    
    public function eliminarUsuario(Request $request)
    {
        $exito = false;

        DB::beginTransaction();
        try {
            $Usuario = User::find($request->id);
            $Usuario->status = false;
            if($Usuario->caja_id)
            {
                $caja = Caja::find($Usuario->caja_id);
                $caja->status = false;
                $caja->save();

                $id = $caja->user->asignacion;
                $id->status = false;
                $id->save();

            }
            $Usuario->caja_id = null;
            $Usuario->save();

            if($request->tipo_usuario == 1){
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->get();
            }else{
                $usuarios = User::where('status', 1)
                                ->where('tipo_usuario_id','!=', 1)
                                ->where('casa_justicia_id', $request->sede)
                                ->get();
            }
            

            $array_usuarios = array();
            $cont = 1;
            foreach ($usuarios as $usuario) {
                $objectUsuario = new \stdClass();
                $objectUsuario->id = $usuario->id;
                $objectUsuario->numero_registro = $cont;
                $objectUsuario->username = $usuario->username;
                $objectUsuario->nombre = $usuario->nombre;
                $objectUsuario->apellido_paterno = $usuario->apellido_paterno;
                $objectUsuario->apellido_materno = $usuario->apellido_materno;
                $objectUsuario->nombrecompleto = $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno;
                $objectUsuario->password = $usuario->password;
                $objectUsuario->sede = $usuario->casaJusticia->nombre;
                $objectUsuario->sede_id = $usuario->casa_justicia_id;
                $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                $objectUsuario->email = $usuario->email;
                if($usuario->caja){
                    $objectUsuario->ventanilla = $usuario->caja->nombre;
                }else{
                    $objectUsuario->ventanilla = 'SIN VENTANILLA';
                }
                // $objectUsuario->tipo_usuario_id = $usuario->tipo_usuario_id;
                // $objectUsuario->tipo_usuario = $usuario->tipoUsuario->nombre;
                // $objectUsuario->area_id = $usuario->area_id;
                // $objectUsuario->area = $usuario->areas->nombre;
                
                array_push($array_usuarios, $objectUsuario);
                $cont++;
            }

            DB::commit();
            $exito = true;
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al eliminar a este usuario.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Usuario eliminado con exito.",
                "usuarios" => $array_usuarios
            ], 200);
        }
    }
}
