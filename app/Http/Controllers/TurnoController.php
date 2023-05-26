<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Turno;
use App\Models\Contador;
use App\Models\Asignacion;
use Mike42\Escpos\Printer;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
use App\Events\LlamarTurnoPuebla;
use App\Events\LlamarTurnoCholula;
use Illuminate\Support\Facades\DB;
use App\Events\LlamarTurnoLaborales;
use Illuminate\Support\Facades\View;
use App\Events\LlamarTurnoHuejotzingo;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class TurnoController extends Controller
{
    public function generarTurno(Request $request)
    {
    
        $exito = false;
        DB::beginTransaction();
        try{
            $asignacion = Asignacion::where('casa_justicia_id',$request->casa_justicia_id)
                                    ->where('tipo_turno',$request->tipo_turno_id)
                                    ->where('asignacion',0)
                                    ->where('status',1)
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
                                    ->where('status',1)
                                    ->get();
                foreach($asignaciones as $asignacion){
                        $asignacion->asignacion = false;
                        $asignacion->save();
                        DB::commit();
                }

                $asignacion = Asignacion::where('casa_justicia_id',$request->casa_justicia_id)
                ->where('tipo_turno',$request->tipo_turno_id)
                ->where('asignacion',0)
                ->where('status',1)
                ->first();

                $asignacion->asignacion = true;
                $asignacion->save();
                DB::commit();
                $user = $asignacion->user_id;
            }
              
            $date = Carbon::now();
            $turno = new Turno;
            $turno->tipo_turno_id = $request->tipo_turno_id;
            $turno->casa_justicia_id = $request->casa_justicia_id;
            $turno->turno = '';
            $turno->fecha_registro = $date->toDateString();
            $turno->hora_registro = $date->toTimeString();
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
            
            switch($tipo_turno){
                case '1':
                   
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
    public function atenderTurno(Request $request)
    {
        $exito = false;
        DB::beginTransaction();
        try{
            $turno_atencion = Turno::where('casa_justicia_id', $request->sede_id)
                                    ->where('user_id', $request->id)
                                    ->where('en_atencion', 1)
                                    ->first(); 

                     
                            
            if($turno_atencion){
                $date = Carbon::now();
                $turno_atencion->en_atencion = 2;
                $turno_atencion->fecha_atencion_fin = $date->toDateString();
                $turno_atencion->hora_atencion_fin = $date->toTimeString();
                $turno_atencion->save();
                DB::commit();

                $array_turnos = array();
                $atender = Turno::where('casa_justicia_id', $request->sede_id)
                                    ->where('user_id', $request->id)
                                    ->where('en_atencion', 0)
                                    ->first(); 

                if($atender)
                {
                    $date = Carbon::now();
                    $atender->en_atencion = 1;
                    $atender->fecha_atencion_inicio = $date->toDateString();
                    $atender->hora_atencion_inicio = $date->toTimeString();
                    $atender->save();
                    DB::commit();
                    $object = new \stdClass();
                    $object->turno = $atender->turno;
                    array_push($array_turnos, $object);

                    $turnos = Turno::where('casa_justicia_id', $request->sede_id)
                                    ->where('user_id', $request->id)
                                    ->where('en_atencion', 0)
                                    ->limit(6)
                                    ->get(); 
                    $cont=1;             
                    foreach($turnos as $turno){
                        $object = new \stdClass();;
                        $object->turno = $turno->turno;
                        array_push($array_turnos, $object);
                        $cont++;
                    }
                    for($i = $cont; $i < 7; $i++)
                    {
                        $object = new \stdClass();;
                        $object->turno = '--';
                        array_push($array_turnos, $object);
                    }
                    
                    if($request->sede_id == 1){
                        LlamarTurnoPuebla::dispatch('hola 1');
                    }elseif($request->sede_id == 2){
                        LlamarTurnoCholula::dispatch('hola 2');
                    }elseif($request->sede_id == 3){
                        LlamarTurnoHuejotzingo::dispatch('hola 3');
                    }elseif($request->sede_id == 4){
                        LlamarTurnoLaborales::dispatch('hola 4');
                    }
                   
                    return response()->json([
                        "status" => "ok",
                        "message" => "Turnos obtenidas con éxito",
                        "turnos" => $array_turnos
                    ], 200);
                }else{
                    $cont=0;
                    for($i = $cont; $i < 7; $i++)
                    {
                        $object = new \stdClass();;
                        $object->turno = '--';
                        array_push($array_turnos, $object);
                    }

                    if($request->sede_id == 1){
                        LlamarTurnoPuebla::dispatch('hola 1');
                    }elseif($request->sede_id == 2){
                        LlamarTurnoCholula::dispatch('hola 2');
                    }elseif($request->sede_id == 3){
                        LlamarTurnoHuejotzingo::dispatch('hola 3');
                    }elseif($request->sede_id == 4){
                        LlamarTurnoLaborales::dispatch('hola 4');
                    }
                    return response()->json([
                        "status" => "no-data",
                        "message" => "No hay turnos",
                        "turnos" => $array_turnos
                    ], 200);

                }
               

            }
            else{
                $array_turnos = array();
                $atender = Turno::where('casa_justicia_id', $request->sede_id)
                                    ->where('user_id', $request->id)
                                    ->where('en_atencion', 0)
                                    ->first(); 

                if($atender)
                {
                    $date = Carbon::now();
                    $atender->en_atencion = 1;
                    $atender->fecha_atencion_inicio = $date->toDateString();
                    $atender->hora_atencion_inicio = $date->toTimeString();
                    $atender->save();
                    DB::commit();

                    $object = new \stdClass();
                    $object->turno = $atender->turno;
                    array_push($array_turnos, $object);

                    $turnos = Turno::where('casa_justicia_id', $request->sede_id)
                                    ->where('user_id', $request->id)
                                    ->where('en_atencion', 0)
                                    ->limit(6)
                                    ->get(); 
                    $cont =1;                
                    foreach($turnos as $turno){
                        $object = new \stdClass();
                        // $object->posicion = $cont;
                        $object->turno = $turno->turno;
                        array_push($array_turnos, $object);
                        $cont++;
                    }
                    for($i = $cont; $i < 7; $i++)
                    {
                        $object = new \stdClass();
                        // $object->posicion = $cont;
                        $object->turno = '--';
                        array_push($array_turnos, $object);
                    }

                    if($request->sede_id == 1){
                        LlamarTurnoPuebla::dispatch('hola 1');
                    }elseif($request->sede_id == 2){
                        LlamarTurnoCholula::dispatch('hola 2');
                    }elseif($request->sede_id == 3){
                        LlamarTurnoHuejotzingo::dispatch('hola 3');
                    }elseif($request->sede_id == 4){
                        LlamarTurnoLaborales::dispatch('hola 4');
                    }
                    return response()->json([
                        "status" => "ok",
                        "message" => "Turnos obtenidas con éxito",
                        "turnos" => $array_turnos
                    ], 200);

                }else{
                    $cont = 0;
                    for($i = $cont; $i < 7; $i++)
                    {
                        $object = new \stdClass();
                        // $object->posicion = $cont;
                        $object->turno = '--';
                        array_push($array_turnos, $object);
                    }

                    if($request->sede_id == 1){
                        LlamarTurnoPuebla::dispatch('hola 1');
                    }elseif($request->sede_id == 2){
                        LlamarTurnoCholula::dispatch('hola 2');
                    }elseif($request->sede_id == 3){
                        LlamarTurnoHuejotzingo::dispatch('hola 3');
                    }elseif($request->sede_id == 4){
                        LlamarTurnoLaborales::dispatch('hola 4');
                    }
                    return response()->json([
                        "status" => "no-data",
                        "message" => "No hay turnos",
                        "turnos" => $array_turnos
                    ], 200);

                }
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar el turnooooo.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
    public function cargarTurnos(Request $request)
    {
        DB::beginTransaction();
        try{
            
            $obtenerturnos = Turno::where('casa_justicia_id', $request->sede_id)
                                ->where('user_id', $request->id)
                                ->where('en_atencion', 0)
                                ->limit(6)
                                ->get(); 

            if($obtenerturnos->count()>0){
               
                    $array = array();
                   $object = new \stdClass();
                    $object->turno = '--';
                    array_push($array, $object);

                    $cont=1;             
                    foreach($obtenerturnos as $turno){
                        $object = new \stdClass();
                        $object->turno = $turno->turno;
                        array_push($array, $object);
                         $cont++;
                    }
                    for($i = $cont; $i < 7; $i++)
                    {
                        $object = new \stdClass();
                        $object->turno = '--';
                        array_push($array, $object);
                    }
    
                    return response()->json([
                        "status" => "ok",
                        "message" => "Turnos obtenidos con éxito",
                        "turnos" => $array
                    ], 200);
    


            }else{
                $cont=0;
                $array = array();
                for($i = $cont; $i < 7; $i++)
                {
                    $object = new \stdClass();
                    $object->turno = '--';
                    array_push($array, $object);
                }
                return response()->json([
                    "status" => "no-data",
                    "message" => "No hay turnos",
                    "turnos" => $array
                ], 200);

            }

           
        } catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar el turnooooo.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

    }

    public function turnosPantalla(Request $request)
    {
        DB::beginTransaction();
        try{
           
            $turnos = Turno::where('casa_justicia_id', $request->casa_justicia_id)
                                // ->where('user_id', $request->id)
                                ->where('en_atencion', '>=' ,1)
                                ->orderBy('fecha_atencion_inicio', 'DESC')
                                ->orderBy('hora_atencion_inicio', 'DESC')
                                ->limit(6)
                                ->get(); 

                if($turnos->count()>0){
                    $cont =0;  
                    $array_turnos = array();              
                    foreach($turnos as $turno){
                        $object = new \stdClass();
                        // $object->posicion = $cont;
                        $object->turno = $turno->turno;
                        $object->caja = $turno->usuario->caja_id;
                        array_push($array_turnos, $object);
                        $cont++;
                    }
                    for($i = $cont; $i < 6; $i++)
                    {
                        $object = new \stdClass();
                        $object->turno = '--';
                        $object->caja = '--';
                        
                        array_push($array_turnos, $object);
                    }

                    return response()->json([
                        "status" => "ok",
                        "message" => "Turnos",
                        "turnos" => $array_turnos
                    ], 200);
                }else{
                    $cont =0;  
                    $array_turnos = array();
                    for($i = $cont; $i < 6; $i++)
                    {
                        $object = new \stdClass();
                        $object->caja = "--";
                        $object->turno = "--";
                        array_push($array_turnos, $object);
                    }

                    return response()->json([
                        "status" => "no-data",
                        "message" => "No hay turnos",
                        "turnos" => $array_turnos
                    ], 200);

                }

                   

        }catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al actualizar el turno.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }

    }

    public function turnosPendientes(Request $request)
    {
        try{
            $turnos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 1)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

            $salas = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 2)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

            $internos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 3)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

            $rapidos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 4)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

            $demandas = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 5)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

            $familiares = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 6)
                                    ->where('en_atencion', 0)
                                    // ->where('status', 1)
                                    ->count();

                        $object = new \stdClass();
                        $object->turnos = $turnos;
                        $object->salas = $salas;
                        $object->internos = $internos;
                        $object->rapidos = $rapidos;
                        $object->demandas = $demandas;
                        $object->familiares = $familiares;

                        return response()->json([
                            "status" => "ok",
                            "message" => "turnos obtenidos con éxito",
                            "pendientes" => $object
                        ], 200);

        }catch (\Throwable $th) {
            DB::rollback();
            $exito = false;
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al obtener los turnos pendientes.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }

    public function generarReporteTiempoReal(Request $request)
    {
        try {
            //Custom Header
            PDF::setHeaderCallback(function($pdf) {
                $pdf->SetFont('helvetica', 'B', 11);

                // Header
                $header_image_file = public_path() . '/img/header_pdf.png';           
                $pdf->Image($header_image_file, 0,0,0,0);
            });

            // Custom Footer
            PDF::setFooterCallback(function($pdf) {
                $pdf->SetFont('helvetica', 'I', 8);

                // Footer
                $footer_image_file = public_path() . '/img/footer_pdf.png';
                $pdf->Image($footer_image_file, 0,280,0,0);
            });

            $PDF_MARGIN_LEFT = 5;
            $PDF_MARGIN_TOP = 30;
            $PDF_MARGIN_RIGHT = 5;
            $PDF_MARGIN_BOTTOM = 20;

            PDF::SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT,$PDF_MARGIN_BOTTOM);
            PDF::SetAutoPageBreak(true, $PDF_MARGIN_BOTTOM);
            PDF::SetTitle('Reporte');
            PDF::AddPage('P', 'A4');
            
            $view = View::make('pdf.reporte_tiempo_real');
            $html_content = $view->render();

            PDF::writeHTML($html_content, true, false, true, false, '');

            ob_end_clean();
    
            PDF::Output('Reporte_Turnos_Oficialia.pdf', 'I');
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Ocurrió un error al generar el reporte.",
                "error" => $th->getMessage(),
                "location" => $th->getFile(),
                "line" => $th->getLine(),
            ], 200);
        }
    }
}
