<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Turno;
use Carbon\Carbon;
use App\Models\Contador;
use App\Models\Asignacion;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;




class TurnoController extends Controller
{
    public function generarTurno(Request $request)
    {
        // return response()->json([
        //     "status" => "ok",
        //     "message" => $request->tipo_turno_id,
        //     // "turno" => $turnoo,
        // ], 200);

        $exito = false;
        DB::beginTransaction();
        try{
            $asignacion = Asignacion::where('casa_justicia_id',$request->casa_justicia_id)
                                    ->where('tipo_turno',$request->tipo_turno_id)
                                    ->where('asignacion',0)
                                    ->first();
            if($asignacion)
            {
                $asignacion->asignacion = true;
                $asignacion->save();
                DB::commit();
                $user = $asignacion->user_id;
            }else{
                $asignaciones = Asignacion::where('casa_justicia_id',$request->casa_justicia_id)
                                    ->where('tipo_turno',$request->tipo_turno_id)
                                    // ->where('asignacion',1)
                                    ->get();
                foreach($asignaciones as $asignacion){
                        $asignacion->asignacion = false;
                        $asignacion->save();
                        DB::commit();
                }

                $asignacion = Asignacion::where('casa_justicia_id',$request->casa_justicia_id)
                ->where('tipo_turno',$request->tipo_turno_id)
                ->where('asignacion',0)
                ->first();

                $asignacion->asignacion = true;
                $asignacion->save();
                DB::commit();
                $user = $asignacion->user_id;
            }
                        
            $turno = new Turno;
            $turno->tipo_turno_id = $request->tipo_turno_id;
            $turno->casa_justicia_id = $request->casa_justicia_id;
            $turno->turno = '';
            $turno->prioridad_id = 1;
            $turno->user_id = $user;
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
                        elseif($contador < 10)
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
            $object = new \stdClass();
            $object->id = $turno->id;
            $object->turno = $turno->turno;

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
                "message" => "Turno generado con éxito. ",
                "turno" => $object,
            ], 200);
        }
    }
    public function imprimirTurno(Request $request)
    {
        try{
            $turno = Turno::find($request->id);
            // if($turno){
                $turnoo = $turno->turno;
                $sede_id =  $turno->casa_justicia_id;
                // $sede_id =  2;

    
                switch($sede_id){
                    case '1':
                        $sede = 'Puebla';
                        $impresora = 'Epson1';
                        break;
                    case '2':
                        $sede = 'Cholula';
                        $impresora = 'Epson1';
                        break;
                    case '3':
                        $sede = 'Huejotzingo';
                        $impresora = 'Epson1';
                        break;
                    case '4':
                        $sede = 'Laborales';
                        $impresora = 'Epson1';
                        break;    
    
                }
    
                 $date = Carbon::now();
                $fecha = $date->toDateTimeString();
                $logo = EscposImage::load("../public/img/logo.png");
                $nombreImpresora = $impresora;
                $connector = new WindowsPrintConnector($nombreImpresora);
                $impresora = new Printer($connector);       
                $impresora->setJustification(Printer::JUSTIFY_CENTER);
                $impresora->bitImageColumnFormat($logo);
                $impresora->text("\n");
                $impresora->setTextSize(1, 1);
                $impresora->text("Oficialía Común de Partes\n");
                $impresora->text($sede."\n");
                $impresora->text("\n");
                $impresora->setTextSize(2, 2);
                $impresora->text("¡Hola!\n");
                $impresora->text("Tu turno es:\n");
                $impresora->textRaw(str_repeat(chr(196), 20).PHP_EOL);
                $impresora->setTextSize(5, 5);
                $impresora->text($turnoo."\n");
                $impresora->setTextSize(2, 2);
                $impresora->textRaw(str_repeat(chr(196), 20).PHP_EOL);
                $impresora->text("\n");
                $impresora->setTextSize(1, 1);
                $impresora->text("\nFecha y hora:\n");
                $impresora->text($fecha);
                $impresora->feed(3);
                $impresora->cut();
                $impresora->close();
    
                return response()->json([
                    "status" => "ok",
                    "message" => "Turno impreso con éxito. ",
                    // "turno" => $object,
                ], 200);
            // }
           


        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al imprimir el turno.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
}
