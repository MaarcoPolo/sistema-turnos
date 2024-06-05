<?php

namespace App\Http\Controllers;

use App\Models\TipoTurno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoTurnoController extends Controller
{
    public function getTiposTurnos()
    {
        try {
            $tipos_turnos = TipoTurno::where('status', 1)->get();

            $array_tipos_turnos = array();
            $cont = 1;
            foreach ($tipos_turnos as $tipo_turno) {
                $objectTipoTurno = new \stdClass();
                $objectTipoTurno->id = $tipo_turno->id;
                $objectTipoTurno->num_registro = $cont;
                $objectTipoTurno->nombre = $tipo_turno->nombre;
                $objectTipoTurno->descripcion = $tipo_turno->descripcion;
                $objectTipoTurno->nomenclatura = $tipo_turno->nomenclatura;
                
                array_push($array_tipos_turnos, $objectTipoTurno);
                $cont++;
            }

            return response()->json([
                "status" => "ok",
                "message" => "Tipos de turnos obtenidos con éxito",
                "tipos_turnos" => $array_tipos_turnos
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener los tipos de turnos",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
    public function guardarTipoTurno(Request $request){

        $exito = false;

        DB::beginTransaction();
        try{
            $tipoTurno = new TipoTurno;
            $tipoTurno->nombre = $request->nombre;
            $tipoTurno->nomenclatura = $request->nomenclatura;
            $tipoTurno->descripcion = $request->descripcion;
            $tipoTurno->save();

            $tiposTurnos = TipoTurno::where('status', 1)->get();

            $array_tipos_turnos = array();
            $cont = 1;
            foreach ($tiposTurnos as $tipoTurno){
                $objectTipoTurno = new \stdClass();
                $objectTipoTurno->id = $tipoTurno->id;
                $objectTipoTurno->num_registro = $cont;
                $objectTipoTurno->nombre = $tipoTurno->nombre;
                $objectTipoTurno->nomenclatura = $tipoTurno->nomenclatura;
                $objectTipoTurno->descripcion = $tipoTurno->descripcion;
                
                array_push($array_tipos_turnos, $objectTipoTurno);
                $cont++;
            }
            DB::commit();
            $exito = true;
        }catch(\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar el nuevo tipo de turno.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Nuevo tipo de turno guardad con éxito.",
                "tipos_turnos" => $array_tipos_turnos,
            
            ], 200);
        }        
    }
    public function actualizarTipoTurno(Request $request){
        $exito = false;

        DB::beginTransaction();
        try {
            $tipoTurno = TipoTurno::find ($request->id);
            $tipoTurno->nombre = $request->nombre;
            $tipoTurno->nomenclatura = $request->nomenclatura;
            $tipoTurno->descripcion = $request->descripcion;
            $tipoTurno->save();

            $tipoTurno = TipoTurno::where('status', 1)->get();

            $array_tipos_turnos = array();
            $cont = 1;
            foreach ($tiposTurnos as $tipoTurno){
                $objectTipoTurno = new \stdClass();
                $objectTipoTurno->id = $tipoTurno->id;
                $objectTipoTurno->num_registro = $cont;
                $objectTipoTurno->nombre = $tipoTurno->nombre;
                $objectTipoTurno->nomenclatura = $tipoTurno->nomenclatura;
                $objectTipoTurno->descripcion = $tipoTurno->descripcion;

                array_push($array_tipos_turnos, $objectTipoTurno);
                $cont++;
            }
            
            DB::commit();
            $exito = true;
        }catch (\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar los datos del tipo de turno.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Tipo de turno actualizado con éxito.",
                "tipos_turnos" => $array_tipos_turnos
            ], 200);
        }
    }
    public function eliminarTipoTurno(Request $request){
        $exito = false;

        DB::beginTransaction();
        try {
            $tipoTurno = TipoTurno::find($request->id);
            $tipoTurno->status = false;
            $tipoTurno->save();

            $tipoTurno = TipoTurno::where('status', 1)->get();

            $array_tipos_turnos = array();
            $cont = 1;
            foreach ($tiposTurnos as $tipoTurno){
                $objectTipoTurno = new \stdClass();
                $objectTipoTurno->id = $tipoTurno->id;
                $objectTipoTurno->num_registro = $cont;
                $objectTipoTurno->nombre = $tipoTurno->nombre;
                $objectTipoTurno->nomenclatura = $tipoTurno->nomenclatura;
                $objectTipoTurno->descripcion = $tipoTurno->descripcion;

                array_push($array_tipos_turnos, $objectTipoTurno);
                $cont++;
            }

            DB::commit();
            $exito = true;
        }catch (\Throwable $th){
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al eliminar el tipo de turno.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
        if($exito){
            return response()->json([
                "status" => "ok",
                "message" => "Tipo de turno eliminado con exito.",
                "tipos_turnos" => $array_tipos_turnos,
            ], 200);
        }
    }
}
