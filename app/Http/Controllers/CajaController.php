<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\User;
use App\Models\Asignacion;
use App\Models\TipoTurno;
use Illuminate\Support\Facades\DB;

class CajaController extends Controller
{
    public function getCajas(Request $request)
    {
        try {
            if($request->tipo == 2){
                // $sede = $request->sede;
                // $cajas = Caja::where('status', 1)->where('casa_justicia_id', $request->sede)->get();
                $cajas = Caja::where('casa_justicia_id', $request->sede)->get();

                $array_cajas = array();
                $cont = 1;
                $nombre = '';

                foreach ($cajas as $caja) {
                    $objectCaja = new \stdClass();
                    $objectCaja->id = $caja->id;
                    $objectCaja->num_registro = $cont;
                    $objectCaja->nombre = $caja->nombre;
                    if($caja->status== 1){
                        $objectCaja->estatus = 'Activa'; 
                    }else{
                        $objectCaja->estatus = 'Desactivada';
                    }
                    $objectCaja->sede = $caja->casaJusticia->nombre;
                    $objectCaja->tipo_id = $caja->tipo_turno_id;

                    for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                        $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                        $nombre = $nombre.$tp->nombre;
                    
                        if($i+1 != strlen($caja->tipo_turno_id)){

                            $nombre =$nombre.',';
                        }
                    }

                    $objectCaja->tipo_ventanilla = $nombre;
                    
                    array_push($array_cajas, $objectCaja);
                    $cont++;
                    $nombre = '';

                }
                return response()->json([
                    "status" => "ok",
                    "message" => "Ventanillas obtenidas con éxito",
                    "cajas" => $array_cajas
                ], 200);
            }else{
                // $cajas = Caja::where('status', 1)->get();
                $cajas = Caja::all();

                $array_cajas = array();
                $cont = 1;
                $nombre = '';
                foreach ($cajas as $caja) {
                    $objectCaja = new \stdClass();
                    $objectCaja->id = $caja->id;
                    $objectCaja->num_registro = $cont;
                    $objectCaja->nombre = $caja->nombre;
                    if($caja->status== 1){
                        $objectCaja->estatus = 'Activa'; 
                    }else{
                        $objectCaja->estatus = 'Desactivada';
                    }
                    $objectCaja->sede = $caja->casaJusticia->nombre;
                    $objectCaja->tipo_id = $caja->tipo_turno_id;
                                            
                        for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                            $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                            $nombre = $nombre.$tp->nombre;
                            
                            if($i+1 != strlen($caja->tipo_turno_id)){

                                $nombre =$nombre.',';
                            }
                        }

                    $objectCaja->tipo_ventanilla = $nombre;
                    
                    array_push($array_cajas, $objectCaja);
                    $cont++;
                    $nombre = '';
                }
    
                return response()->json([
                    "status" => "ok",
                    "message" => "Ventanillas obtenidas con éxito",
                    "cajas" => $array_cajas
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener las Ventanillas",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
    public function getCajasDisponibles(Request $request)
    {
        try{
            $cajas = Caja::where('casa_justicia_id', $request->sede)
                        ->where('status' , 0)
                        ->get();

                        $array = array();
                        $cont = 1;
                        foreach ($cajas as $caja) {
                            $objectCaja = new \stdClass();
                            $objectCaja->id = $caja->id;
                            $objectCaja->num = $cont;
                            $objectCaja->nombre = $caja->nombre;
                            
                            array_push($array, $objectCaja);
                            $cont++;
                        }
            
                        return response()->json([
                            "status" => "ok",
                            "message" => "Ventanillas obtenidas con éxito",
                            "ventanillas" => $array
                        ], 200);


        }catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener las Ventanillas",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

    }
    public function guardarCaja(Request $request){

        $exito = false;
    
        DB::beginTransaction();
        try{
            $inserttipos = "";
            foreach($request->tipo as $tipo)
            {
                $inserttipos =$inserttipos.$tipo;
                if(count($request->tipo ) > 1)
                    $inserttipos = $inserttipos;

            }
                $caja = new Caja;
                $caja->nombre = $request->nombre;
                $caja->casa_justicia_id = $request->sede;
                $caja->tipo_turno_id = $inserttipos;
                $caja->status = 0;
                $caja->save();


            if($request->tipo_usuario == 1){
                // $cajas = Caja::where('status', 1)->get();
                $cajas = Caja::all();

            }else{
                // $cajas = Caja::where('status', 1)->where('casa_justicia_id', $request->sede)->get();
                $cajas = Caja::where('casa_justicia_id', $request->sede)->get();
            }

            $array_cajas = array();
            $cont = 1;
            $nombre = '';

            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
                if($caja->status== 1){
                    $objectCaja->estatus = 'Activa'; 
                }else{
                    $objectCaja->estatus = 'Desactivada';
                }
                $objectCaja->sede = $caja->casaJusticia->nombre;
                $objectCaja->tipo_id = $caja->tipo_turno_id;
                
                for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                            $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                            $nombre = $nombre.$tp->nombre;
                            
                            if($i+1 != strlen($caja->tipo_turno_id)){
                                
                                $nombre =$nombre.',';
                            }
                        }
        
                $objectCaja->tipo_ventanilla = $nombre;        
                $nombre = '';
                
                array_push($array_cajas, $objectCaja);
                $cont++;
            }
            DB::commit();
            $exito = true;
        }catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar la nueva Ventanilla.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Nueva Ventanilla guardada con exito.",
                "cajas" => $array_cajas,
            ], 200);
        }
    }
    public function actualizarCaja(Request $request)
    {
        $exito = false;

        DB::beginTransaction();
        try {
            $caja = Caja::find ($request->id);
            $caja->nombre = $request->nombre;
            $caja->save();

            if($request->tipo_usuario == 1){
                // $cajas = Caja::where('status', 1)->get();
                $cajas = Caja::all();
            }else{
                // $cajas = Caja::where('status', 1)->where('casa_justicia_id', $request->sede)->get();
                $cajas = Caja::where('casa_justicia_id', $request->sede)->get();
            }
            $array_cajas = array();
            $cont = 1;
            $nombre = '';

            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
                if($caja->status== 1){
                    $objectCaja->estatus = 'Activa'; 
                }else{
                    $objectCaja->estatus = 'Desactivada';
                }
                $objectCaja->sede = $caja->casaJusticia->nombre;
                $objectCaja->tipo_id = $caja->tipo_turno_id;

                for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                    $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                    $nombre = $nombre.$tp->nombre;
                            
                        if($i+1 != strlen($caja->tipo_turno_id)){

                                $nombre =$nombre.',';
                            }
                        }
                    
                    $objectCaja->tipo_ventanilla = $nombre;
                    $nombre = '';

                array_push($array_cajas, $objectCaja);
                $cont++;
            }
            
            DB::commit();
            $exito = true;
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar los datos la Ventanilla.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Ventanilla actualizada con éxito.",
                "cajas" => $array_cajas
            ], 200);
        }
    }
    public function eliminarCaja(Request $request) {
        $exito = false;

        DB::beginTransaction();
        try {
            $caja = Caja::find($request->id);
            $caja->status = false;
            $caja->save();
//////////////////////////////
            $id = $caja->user->asignacion;
            if($id){
                $id->status = false;
                $id->save();
                //  QUITAR CAJA ASIGNADA
                // $usuario = User::find($id->user_id);
                // $usuario->caja_id = 0;
                // $usuario->save();

            }
           
            if($request->tipo_usuario == 1){
                // $cajas = Caja::where('status', 1)->get();
                $cajas = Caja::all();
            }else{
                $cajas = Caja::where('casa_justicia_id', $caja->casa_justicia_id)->get();
                // $cajas = Caja::where('status', 1)->where('casa_justicia_id', $caja->casa_justicia_id)->get();
            }

            $array_cajas = array();
            $cont = 1;
            $nombre = '';

            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
                if($caja->status== 1){
                    $objectCaja->estatus = 'Activa'; 
                }else{
                    $objectCaja->estatus = 'Desactivada';
                }
                $objectCaja->sede = $caja->casaJusticia->nombre;
                $objectCaja->tipo_id = $caja->tipo_turno_id;

                for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                    $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                    $nombre = $nombre.$tp->nombre;
                    
                    if($i+1 != strlen($caja->tipo_turno_id)){

                        $nombre =$nombre.',';
                    }
                }
    
            $objectCaja->tipo_ventanilla = $nombre;
            $nombre = '';

                array_push($array_cajas, $objectCaja);
                $cont++;
            }

            DB::commit();
            $exito = true;
        }catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al eliminar la Ventanilla.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if ($exito) {
                return response()->json([
                    "status" => "ok",
                    "message" => "Ventanilla eliminada con exito.",
                    "cajas" => $array_cajas,
                ], 200);
            }
    }
    public function actualizarTipoCaja(Request $request)
    {
        $exito = false;

        DB::beginTransaction();
        try {

            $tipo_id = '';
            for($i=0;$i < count($request->tipo_id); $i++){

                $tipo_id = $tipo_id.$request->tipo_id[$i];
                
            }

            $caja = Caja::find($request->id);
            $caja->tipo_turno_id = $tipo_id;
            $caja->save();

            $user = User::where('caja_id',$request->id)->first();
            $id_user = $user->id;
            $sede = $user->casa_justicia_id;

            $asignacion_borrar = Asignacion::where('user_id',$id_user)->delete();

                for($i=0; $i < count($request->tipo_id); $i++){    

                        $asignacion = new Asignacion;
                        $asignacion->user_id = $id_user;
                        $asignacion->casa_justicia_id = $sede;
                        $asignacion->tipo_turno = intval($request->tipo_id[$i]);
                        $asignacion->save();
                    }


            $cajas = Caja::where('casa_justicia_id', $caja->casa_justicia_id)->get();
                $array_cajas = array();
                $cont = 1;
                $nombre = '';

                foreach ($cajas as $caja) {
                    $objectCaja = new \stdClass();
                    $objectCaja->id = $caja->id;
                    $objectCaja->num_registro = $cont;
                    $objectCaja->nombre = $caja->nombre;
                    $objectCaja->sede = $caja->casaJusticia->nombre;
                    $objectCaja->tipo_id = $caja->tipo_turno_id;

                    for($i=0;$i <strlen($caja->tipo_turno_id); $i++){

                        $tp =  TipoTurno::find(intval($caja->tipo_turno_id[$i]));
                        $nombre = $nombre.$tp->nombre;
                        
                        if($i+1 != strlen($caja->tipo_turno_id)){
                            
                            $nombre =$nombre.',';
                        }
                    }
                
                $objectCaja->tipo_ventanilla = $nombre;
                $nombre = '';
    
                    array_push($array_cajas, $objectCaja);
                    $cont++;
                }
            
            DB::commit();
            $exito = true;
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar los datos la Ventanilla.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

        if ($exito) {
            return response()->json([
                "status" => "ok",
                "message" => "Ventanilla actualizada con éxito.",
                "cajas" => $array_cajas
            ], 200);
        }
    }
}
