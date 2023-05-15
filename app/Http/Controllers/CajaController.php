<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use Illuminate\Support\Facades\DB;

class CajaController extends Controller
{
    public function getCajas(Request $request)
    {
        try {
            if($request->tipo == 2){
                // $sede = $request->sede;
                $cajas = Caja::where('status', 1)->where('casa_justicia_id', $request->sede)->get();
                $array_cajas = array();
                $cont = 1;
                foreach ($cajas as $caja) {
                    $objectCaja = new \stdClass();
                    $objectCaja->id = $caja->id;
                    $objectCaja->num_registro = $cont;
                    $objectCaja->nombre = $caja->nombre;
                    // $objectArea->estatus = $area->estatus;
                    
                    array_push($array_cajas, $objectCaja);
                    $cont++;
                }
    
                return response()->json([
                    "status" => "ok",
                    "message" => "Ventanillas obtenidas con éxito",
                    "cajas" => $array_cajas
                ], 200);


            }else{
                $cajas = Caja::where('status', 1)->get();

                $array_cajas = array();
                $cont = 1;
                foreach ($cajas as $caja) {
                    $objectCaja = new \stdClass();
                    $objectCaja->id = $caja->id;
                    $objectCaja->num_registro = $cont;
                    $objectCaja->nombre = $caja->nombre;
                    // $objectArea->estatus = $area->estatus;
                    
                    array_push($array_cajas, $objectCaja);
                    $cont++;
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
    public function guardarCaja(Request $request) {
        $exito = false;
       
        DB::beginTransaction();
        try{
            $caja = new Caja;
            $caja->nombre = $request->nombre;
            $caja->casa_justicia_id = 1;
            $caja->tipo_turno_id = 1;
            $caja->save();

            $cajas = Caja::where('status', 1)->get();

            $array_cajas = array();
            $cont = 1;
            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
                
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

            $cajas = Caja::where('status', 1)->get();

            $array_cajas = array();
            $cont = 1;
            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
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
            // $oficio->status = false;
            $caja->save();

            $cajas = Caja::where('status', 1)->get();

            $array_cajas = array();
            $cont = 1;
            foreach ($cajas as $caja) {
                $objectCaja = new \stdClass();
                $objectCaja->id = $caja->id;
                $objectCaja->num_registro = $cont;
                $objectCaja->nombre = $caja->nombre;
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
}
