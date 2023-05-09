<?php

namespace App\Http\Controllers;

use App\Models\TipoTurno;
use Illuminate\Http\Request;

class TipoTurnoController extends Controller
{
    public function getTiposTurnos(){
        try {
            
            $tipos_turnos = TipoTurno::where('status', 1)->get();

            $array_tipos_turnos = array();
            $cont = 1;
            foreach ($tipos_turnos as $tipo_documento) {
                $objectTipoTurno = new \stdClass();
                $objectTipoTurno->id = $tipo_documento->id;
                $objectTipoTurno->num_registro = $cont;
                $objectTipoTurno->nombre = $tipo_documento->nombre;
                $objectTipoTurno->descripcion = $tipo_documento->descripcion;
                $objectTipoTurno->nomenclatura = $tipo_documento->nomenclatura;
                
                array_push($array_tipos_turnos, $objectTipoTurno);
                $cont++;
            }

            return response()->json([
                "status" => "ok",
                "message" => "Tipos de turnos obtenidos con éxito",
                "tipos_turnos" => $array_tipos_turnos
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener los tipos de turnos",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
}
