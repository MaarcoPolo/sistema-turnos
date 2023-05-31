<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\DB;

class TipoUsuarioController extends Controller
{
    public function getTipoUsuarios()
    {
        try{
            $tipos = TipoUsuario::where('id', '!=', 1)->get();

            $array = array();
            foreach($tipos as $tipo){
                $object = new \stdClass();
                $object->id = $tipo->id;
                $object->nombre = $tipo->nombre;
                array_push($array, $object);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Tipos de usuario obtenidas con éxito",
                "tipoUsuarios" => $array
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener los tipos de usuarios",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
}
