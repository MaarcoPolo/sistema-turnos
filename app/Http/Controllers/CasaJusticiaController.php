<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CasaJusticia;
use App\Models\Contador;

class CasaJusticiaController extends Controller
{
    public function  getCasasJusticia()
    {
        try{

            $casasJusticia = CasaJusticia::where('status',1)->get();

            $array_casa_justicia = array();
            $cont = 1;
            foreach($casasJusticia as $casaJusticia){
                $objectCasaJusticia = new \stdClass();
                $objectCasaJusticia->id = $casaJusticia->id;
                $objectCasaJusticia->num_registro = $cont;
                $objectCasaJusticia->nombre = $casaJusticia->nombre;
                $objectCasaJusticia->nomenclatura = $casaJusticia->nomenclatura;
                $objectCasaJusticia->nombre_impresora = $casaJusticia->nombre_impresora;
                $objectCasaJusticia->tipo_conexion_impresora = $casaJusticia->tipo_conexion_impresora;
                $objectCasaJusticia->ip = $casaJusticia->ip;
                array_push($array_casa_justicia, $objectCasaJusticia);
                $cont++;
            }

            return response()->json([
                "status" => "ok",
                "message" => "Casas de Justicia obtenidas con éxito",
                "casa_justicia" => $array_casa_justicia
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener las casas de justicia",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
    public function guardarCasaJusticia(Request $request){

        $exito = false;

        DB::beginTransaction();
        try{
            $casaJusticia = new CasaJusticia;
            $casaJusticia->nombre = $request->nombre;
            $casaJusticia->nomenclatura = $request->nomenclatura;
            $casaJusticia->nombre_impresora = $request->nombre_impresora;
            $casaJusticia->tipo_conexion_impresora = $request->tipo_conexion_impresora;
            $casaJusticia->ip = $request->ip;
            $casaJusticia->status = true;
            $casaJusticia->save();

            $contador = new Contador;
            $contador->contador = 1;
            $contador->casa_justicia_id = $casaJusticia->id;
            $contador->save();

            $casasJusticia = CasaJusticia::where('status', 1)->get();

            $array_casa_justicia = array();
            $cont = 1;
            foreach($casasJusticia as $casaJusticia){
                $objectCasaJusticia = new \stdClass();
                $objectCasaJusticia->id = $casaJusticia->id;
                $objectCasaJusticia->num_registro = $cont;
                $objectCasaJusticia->nombre = $casaJusticia->nombre;
                $objectCasaJusticia->nomenclatura = $casaJusticia->nomenclatura;
                $objectCasaJusticia->nombre_impresora = $casaJusticia->nombre_impresora;
                $objectCasaJusticia->tipo_conexion_impresora = $casaJusticia->tipo_conexion_impresora;
                $objectCasaJusticia->ip = $casaJusticia->ip;
                array_push($array_casa_justicia, $objectCasaJusticia);
                $cont++;
            }
            DB::commit();
            $exito = true;
        }catch(\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al guardar la nueva casa de justicia.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Nueva casa de justicia guardada con éxito.",
                "casa_justicia" => $array_casa_justicia
            
            ], 200);
        }        
    }
    public function actualizarCasaJusticia(Request $request){
        $exito = false;

        DB::beginTransaction();
        try {
            $casaJusticia = CasaJusticia::find ($request->id);
            $casaJusticia->nombre = $request->nombre;
            $casaJusticia->nomenclatura = $request->nomenclatura;
            $casaJusticia->nombre_impresora = $request->nombre_impresora;
            $casaJusticia->tipo_conexion_impresora = $request->tipo_conexion_impresora;
            $casaJusticia->ip = $request->ip;
            $casaJusticia->save();

            $casasJusticia = CasaJusticia::where('status', 1)->get();

            $array_casa_justicia = array();
            $cont = 1;
            foreach($casasJusticia as $casaJusticia){
                $objectCasaJusticia = new \stdClass();
                $objectCasaJusticia->id = $casaJusticia->id;
                $objectCasaJusticia->num_registro = $cont;
                $objectCasaJusticia->nombre = $casaJusticia->nombre;
                $objectCasaJusticia->nomenclatura = $casaJusticia->nomenclatura;
                $objectCasaJusticia->nombre_impresora = $casaJusticia->nombre_impresora;
                $objectCasaJusticia->tipo_conexion_impresora = $casaJusticia->tipo_conexion_impresora;
                $objectCasaJusticia->ip = $casaJusticia->ip;
                array_push($array_casa_justicia, $objectCasaJusticia);
                $cont++;
            }
            
            DB::commit();
            $exito = true;
        }catch (\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar los datos de la casa de justicia.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Casa de justicia actualizada con éxito.",
                "casa_justicia" => $array_casa_justicia
            ], 200);
        }
    }
    public function eliminarCasaJusticia(Request $request){
        $exito = false;

        DB::beginTransaction();
        try {
            $casaJusticia = CasaJusticia::find($request->id);
            $casaJusticia->status = false;
            $casaJusticia->save();

            $casasJusticia = CasaJusticia::where('status', 1)->get();

            $array_casa_justicia = array();
            $cont = 1;
            foreach($casasJusticia as $casaJusticia){
                $objectCasaJusticia = new \stdClass();
                $objectCasaJusticia->id = $casaJusticia->id;
                $objectCasaJusticia->num_registro = $cont;
                $objectCasaJusticia->nombre = $casaJusticia->nombre;
                $objectCasaJusticia->nomenclatura = $casaJusticia->nomenclatura;
                $objectCasaJusticia->nombre_impresora = $casaJusticia->nombre_impresora;
                $objectCasaJusticia->tipo_conexion_impresora = $casaJusticia->tipo_conexion_impresora;
                $objectCasaJusticia->ip = $casaJusticia->ip;
                array_push($array_casa_justicia, $objectCasaJusticia);
                $cont++;
            }

            DB::commit();
            $exito = true;
        }catch (\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al eliminar la casa de justicia.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Casa de justicia eliminada con exito.",
                "casa_justicia" => $array_casa_justicia
            ], 200);
        }
    }
}
