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
        $exito = false;

        DB::beginTransaction();
        try{
                        
            $turno = new Turno;
            $turno->tipo_turno_id = $request->tipo_turno_id;
            $turno->casa_justicia_id = $request->casa_justicia_id;
            $turno->turno = '';
            $turno->prioridad_id = 1;
            $turno->user_id = 1;
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

            $con = Contador::where('casa_justicia_id',$sede)->first();
            $contador = $con->contador;
            $id_contador = $con->id;
            // return response()->json([
            //     "status" => "ok",
            //     "message" => $id_contador,
            //     // "cita_agendada" => $citaAgendada,
            // ], 200);
            switch($tipo_turno){
                case '1':
                    // $contador = Contador::where('casa_justicia_id',$sede)->get();
                    // if($contador == 0)
                    // {
                    //     $turnoo = $turnoo.'T0001'.$nomen;
                    // }
                    if($contador < 10)
                    {
                        $turnoo = $turnoo.'T000'.$contador.$nomen;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'T00'.$contador.$nomen;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'T0'.$contador.$nomen; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'T'.$contador.$nomen;
                    }
                    break;
                case '2':
                        // $contador = Contador::where('casa_justicia_id',$sede)->get();
                        if($contador == 0)
                        {
                            $turnoo = $turnoo.'S0001'.$nomen;
                        }
                        elseif($conSador < 10)
                        {
                            $turnoo = $turnoo.'S000'.$contador.$nomen;
                        }
                        elseif($contador >= 10 && $contador < 100)
                        {
                            $turnoo = $turnoo.'S00'.$contador.$nomen;   
                        }
                        elseif($contador >= 100 && $contador < 1000)
                        {
                            $turnoo = $turnoo.'S0'.$contador.$nomen; 
                        }
                        elseif($contador >= 1000)
                        {
                            $turnoo = $turnoo.'S'.$contador.$nomen;
                        }
                        break;
                case '3':
                    // $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'A0001'.$nomen;
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'A000'.$contador.$nomen;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'A00'.$contador.$nomen;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'A0'.$contador.$nomen; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'A'.$contador.$nomen;
                    }
                    break;
                case '4':
                    // $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'R0001'.$nomen;
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'R000'.$contador.$nomen;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'R00'.$contador.$nomen;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'R0'.$contador.$nomen; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'R'.$contador.$nomen;
                    }
                    break;
                case '5':
                    // $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'D0001'.$nomen;
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'D000'.$contador.$nomen;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'D00'.$contador.$nomen;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'D0'.$contador.$nomen; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'D'.$contador.$nomen;
                    }
                    break;
                case '6':
                    // $contador = Contador::where('casa_justicia_id',$sede)->get();
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'J0001'.$nomen;
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'J000'.$contador.$nomen;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'J00'.$contador.$nomen;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'J0'.$contador.$nomen; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'J'.$contador.$nomen;
                    }
                    break;

            }
            $turno->turno = $turnoo;
            $turno->save();

            DB::commit();
            $exito = true;

        }catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar el turno",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

        if ($exito) {
            $update = Contador::find($id_contador);
            $update->contador++;
            $update->save();
            DB::commit();

            return response()->json([
                "status" => "ok",
                "message" => "Turno generado con éxito.",
                // "cita_agendada" => $citaAgendada,
            ], 200);
        }
    }
}
