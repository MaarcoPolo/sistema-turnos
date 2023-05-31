<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CasaJusticia;


class CasaJusticiaController extends Controller
{
    public function  getCasasJusticia()
    {
        try{

            $sedes = CasaJusticia::all();

            $array = array();
            foreach($sedes as $sede){
                $object = new \stdClass();
                $object->id = $sede->id;
                $object->nombre = $sede->nombre;
                array_push($array, $object);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Casas de Justicia obtenidas con éxito",
                "sedes" => $array
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
    
}
