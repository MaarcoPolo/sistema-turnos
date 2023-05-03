<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Turno;
use App\Models\Contador;




class TurnoController extends Controller
{
    public function generarTurno(Request $request)
    {
        try{
            
            $turno = new Turno;
            $turno->tipo_turno_id = $request->tipo_turno_id;
            $turno->casa_justicia_id = $request->casa_justicia_id;
            $turno->save();

            $sede = $turno->casa_justicia_id;
            if($sede == 1){
                    $nomen = 'P';
            }
            if($sede == 2){
                    $nomen = 'C';
            }
            if($sede == 3){
                    $nomen = 'H';
            }
            if($sede == 4){
                    $nomen = 'L';
            }
            $tipo_turno = $turno->tipo_turno_id; 
            $turnoo = '';

            switch($tipo_turno){
                case '1':
                    $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador->contador == 0)
                    {
                        $turno = $turno.'T0001'.$nomen;
                    }
                    elseif($contador->contador < 10)
                    {
                        $turno = $turno.'T000'.$contador->contador.$nomen;
                    }
                    elseif($contador->contador >= 10 && $contador->contador < 100)
                    {
                        $turno = $turno.'T00'.$contador->contador.$nomen;   
                    }
                    elseif($contador->contador >= 100 && $contador->contador < 1000)
                    {
                        $turno = $turno.'T0'.$contador->contador.$nomen; 
                    }
                    elseif($contador->contador >= 1000)
                    {
                        $turno = $turno.'T'.$contador->contador.$nomen;
                    }
                    break;
                    case '2':
                        $contador = Contador::where('casa_justicia_id',$sede)->get();
                        if($contador->contador == 0)
                        {
                            $turno = $turno.'S0001'.$nomen;
                        }
                        elseif($conSador->contador < 10)
                        {
                            $turno = $turno.'S000'.$contador->contador.$nomen;
                        }
                        elseif($contador->contador >= 10 && $contador->contador < 100)
                        {
                            $turno = $turno.'S00'.$contador->contador.$nomen;   
                        }
                        elseif($contador->contador >= 100 && $contador->contador < 1000)
                        {
                            $turno = $turno.'S0'.$contador->contador.$nomen; 
                        }
                        elseif($contador->contador >= 1000)
                        {
                            $turno = $turno.'S'.$contador->contador.$nomen;
                        }
                        break;
                case '3':
                    $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador->contador == 0)
                    {
                        $turno = $turno.'A0001'.$nomen;
                    }
                    elseif($contador->contador < 10)
                    {
                        $turno = $turno.'A000'.$contador->contador.$nomen;
                    }
                    elseif($contador->contador >= 10 && $contador->contador < 100)
                    {
                        $turno = $turno.'A00'.$contador->contador.$nomen;   
                    }
                    elseif($contador->contador >= 100 && $contador->contador < 1000)
                    {
                        $turno = $turno.'A0'.$contador->contador.$nomen; 
                    }
                    elseif($contador->contador >= 1000)
                    {
                        $turno = $turno.'A'.$contador->contador.$nomen;
                    }
                    break;
                case '4':
                    $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador->contador == 0)
                    {
                        $turno = $turno.'R0001'.$nomen;
                    }
                    elseif($contador->contador < 10)
                    {
                        $turno = $turno.'R000'.$contador->contador.$nomen;
                    }
                    elseif($contador->contador >= 10 && $contador->contador < 100)
                    {
                        $turno = $turno.'R00'.$contador->contador.$nomen;   
                    }
                    elseif($contador->contador >= 100 && $contador->contador < 1000)
                    {
                        $turno = $turno.'R0'.$contador->contador.$nomen; 
                    }
                    elseif($contador->contador >= 1000)
                    {
                        $turno = $turno.'R'.$contador->contador.$nomen;
                    }
                    break;

            }

        }catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar el turno",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
}
