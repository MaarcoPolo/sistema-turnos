<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Turno;
use App\Events\LlamarTurnoPuebla;
use App\Events\LlamarTurnoCholula;
use App\Events\LlamarTurnoHuejotzingo;
use App\Events\LlamarTurnoLaborales;
use App\Events\CargarTurnosPuebla;
use App\Events\CargarTurnosCholula;
use App\Events\CargarTurnosHuejotzingo;
use App\Events\CargarTurnosLaborales;
use App\Models\Contador;
use App\Models\Asignacion;
use Mike42\Escpos\Printer;
use App\Models\CasaJusticia;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;


class TurnoController extends Controller
{
    public function generarTurno(Request $request)
    {
    
        $exito = false;
        DB::beginTransaction();
        try{
            $ultimo_turno = Turno::where('casa_justicia_id', $request->casa_justicia_id)
                                ->orderBy('id', 'desc')
                                ->first();

            $date = Carbon::now();
            $turno = new Turno;
            $turno->tipo_turno_id = $request->tipo_turno_id;
            $turno->casa_justicia_id = $request->casa_justicia_id;
            $turno->turno = '';
            $turno->fecha_registro = $date->toDateString();
            $turno->hora_registro = $date->toTimeString();
            $turno->prioridad_id = 1;
            $turno->save();

            $tipo_turno = $turno->tipo_turno_id; 
            $turnoo = '';
            $otra = $date->toDateString();
            
            if($ultimo_turno){
                $ultima_fecha = $ultimo_turno->fecha_registro;
                if($ultima_fecha >= $otra){
                    $con = Contador::find($request->casa_justicia_id);
                    $contador = $con->contador;
                    $id_contador = $con->id;
                }else{
                    $con = Contador::find($request->casa_justicia_id);
                    $con->contador = 1;
                    $con->save();
                    $contador = $con->contador;
                    $id_contador = $con->id;
                }

            }else{
                $con = Contador::find($request->casa_justicia_id);
                $contador = $con->contador;
                $id_contador = $con->id;

            }
            switch($tipo_turno){
                case '1':
                
                    if($contador < 10)
                    {
                        $turnoo = $turnoo.'T000'.$contador;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'T00'.$contador;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'T0'.$contador; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'T'.$contador;
                    }
                    break;
                case '2':
                        if($contador == 0)
                        {
                            $turnoo = $turnoo.'S0001';
                        }
                        elseif($contador < 10)
                        {
                            $turnoo = $turnoo.'S000'.$contador;
                        }
                        elseif($contador >= 10 && $contador < 100)
                        {
                            $turnoo = $turnoo.'S00'.$contador;   
                        }
                        elseif($contador >= 100 && $contador < 1000)
                        {
                            $turnoo = $turnoo.'S0'.$contador; 
                        }
                        elseif($contador >= 1000)
                        {
                            $turnoo = $turnoo.'S'.$contador;
                        }
                        break;
                case '3':
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'A0001';
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'A000'.$contador;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'A00'.$contador;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'A0'.$contador; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'A'.$contador;
                    }
                    break;
                case '4':
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'R0001';
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'R000'.$contador;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'R00'.$contador;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'R0'.$contador; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'R'.$contador;
                    }
                    break;
                case '5':
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'D0001';
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'D000'.$contador;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'D00'.$contador;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'D0'.$contador; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'D'.$contador;
                    }
                    break;
                case '6':
                    if($contador == 0)
                    {
                        $turnoo = $turnoo.'J0001';
                    }
                    elseif($contador < 10)
                    {
                        $turnoo = $turnoo.'J000'.$contador;
                    }
                    elseif($contador >= 10 && $contador < 100)
                    {
                        $turnoo = $turnoo.'J00'.$contador;   
                    }
                    elseif($contador >= 100 && $contador < 1000)
                    {
                        $turnoo = $turnoo.'J0'.$contador; 
                    }
                    elseif($contador >= 1000)
                    {
                        $turnoo = $turnoo.'J'.$contador;
                    }
                    break;
                    case '7':
                        if($contador == 0)
                        {
                            $turnoo = $turnoo.'E0001';
                        }
                        elseif($contador < 10)
                        {
                            $turnoo = $turnoo.'E000'.$contador;
                        }
                        elseif($contador >= 10 && $contador < 100)
                        {
                            $turnoo = $turnoo.'E00'.$contador;   
                        }
                        elseif($contador >= 100 && $contador < 1000)
                        {
                            $turnoo = $turnoo.'E0'.$contador; 
                        }
                        elseif($contador >= 1000)
                        {
                            $turnoo = $turnoo.'E'.$contador;
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
                "message" => "Ocurrió un error  controlador al generar el turno",
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
            if($request->casa_justicia_id == 1){
                CargarTurnosPuebla::dispatch();
            }elseif($request->casa_justicia_id == 2){
                CargarTurnosCholula::dispatch();
            }elseif($request->casa_justicia_id == 3){
                CargarTurnosHuejotzingo::dispatch();
            }elseif($request->casa_justicia_id == 4){
                CargarTurnosLaborales::dispatch();
            }
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
            $turnoo = $turno->turno;
            $sede_id =  $turno->casa_justicia_id;

            $sede = $turno->casaJusticia->nombre;
            $tipo_red = $turno->casaJusticia->tipo_conexion_impresora;
            
            if($tipo_red == 'local'){
                $impresora = $turno->casaJusticia->nombre_impresora;
                $connector = new WindowsPrintConnector($impresora);
            }else{
                $impresora = $turno->casaJusticia->ip;
                $connector = new NetworkPrintConnector($impresora, 9100);
            }
            
            $date = Carbon::now();
            $fecha = $date->toDateTimeString();
            $logo = EscposImage::load("../public/img/logo.png");
            // $nombreImpresora = $impresora;
            $impresora = new Printer($connector);       
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->bitImageColumnFormat($logo);
            // $impresora->text("\n");
            // $impresora->setTextSize(1, 1);
            // $impresora->text("Oficialía Común de Partes\n");
            // $impresora->text($sede."\n");
            // $impresora->text("\n");
            // $impresora->setTextSize(2, 2);
            // $impresora->text("¡Hola!\n");
            // $impresora->text("Tu turno es:\n");
            $impresora->textRaw(str_repeat(chr(196), 20).PHP_EOL);
            $impresora->setTextSize(3, 3);
            $impresora->text($turnoo);
            // $impresora->setTextSize(2, 2);
            // $impresora->textRaw(str_repeat(chr(196), 20).PHP_EOL);
            // $impresora->text("\n");
            $impresora->setTextSize(1, 1);
            $impresora->text("\nFecha y hora:\n");
            $impresora->text($fecha);
            $impresora->feed(1);
            $impresora->cut();
            $impresora->close();

            return response()->json([
                "status" => "ok",
                "message" => "Turno impreso con éxito. ",
            ], 200);

        } catch (\Throwable $th) {
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
            $tiposTurnos = Asignacion::select('tipo_turno')->where('user_id', $request->id)->where('casa_justicia_id', $request->sede_id)->get();
            
                foreach ($tiposTurnos as $tipoTurno){
                    
                    $tipo_turnoA  = $tipoTurno->tipo_turno;
                
                    $turno_atencion = Turno::where('casa_justicia_id', $request->sede_id)
                                            ->where('tipo_turno_id', $tipo_turnoA)
                                            ->where('en_atencion', 1)
                                            ->where('user_id',$request->id)
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
                                            ->where('tipo_turno_id', $tipo_turnoA)
                                            ->where('en_atencion', 0)
                                            ->first(); 

                            if($atender){
                                $date = Carbon::now();
                                $atender->en_atencion = 1;
                                $atender->fecha_atencion_inicio = $date->toDateString();
                                $atender->hora_atencion_inicio = $date->toTimeString();
                                $atender->user_id = $request->id;
                                $atender->save();
                                DB::commit();

                                $object = new \stdClass();
                                $object->turno = $atender->turno;
                                array_push($array_turnos, $object);

                                    if($request->sede_id == 1){
                                    LlamarTurnoPuebla::dispatch('hola 1-');
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
                            }

                        }else{
                                
                                $atender = Turno::where('casa_justicia_id', $request->sede_id)
                                            ->where('tipo_turno_id', $tipo_turnoA)
                                            ->where('en_atencion', 0)
                                            ->first(); 
                                            
                                $array_turnos = array();
                                
                                if($atender){
                                    $date = Carbon::now();
                                    $atender->en_atencion = 1;
                                    $atender->fecha_atencion_inicio = $date->toDateString();
                                    $atender->hora_atencion_inicio = $date->toTimeString();
                                    $atender->user_id = $request->id;
                                    $atender->save();
                                    DB::commit();

                                    $object = new \stdClass();
                                    $object->turno = $atender->turno;
                                    array_push($array_turnos, $object);

                                    if($request->sede_id == 1){
                                    LlamarTurnoPuebla::dispatch('hola 1---');
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

                                }
                            } 
                    }
                    return response()->json([
                                "status" => "no-data",
                                "message" => "No tienes turnos pendientes por atender",
                                ], 200);

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
                    "message" => "No tienes turnos pendientes por atender",
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
                                ->where('en_atencion', '>=' ,1)
                                ->orderBy('fecha_atencion_inicio', 'DESC')
                                ->orderBy('hora_atencion_inicio', 'DESC')
                                ->limit(10)
                                ->get(); 

                if($turnos->count()>0){
                    $cont =0;  
                    $array_turnos = array();              
                    foreach($turnos as $turno){
                        $object = new \stdClass();
                        $object->turno = $turno->turno;
                        $object->caja = substr($turno->usuario->caja->nombre, 10);
                        array_push($array_turnos, $object);
                        $cont++;
                    }
                    for($i = $cont; $i < 10; $i++)
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
                    for($i = $cont; $i < 10; $i++)
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

public function turnosPendientes(Request $request){
        try{
            $escritosConAnexos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 1)
                                    ->where('en_atencion', 0)
                                    ->count();

            $apelaciones = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 2)
                                    ->where('en_atencion', 0)
                                    ->count();

            $trabajadores = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 3)
                                    ->where('en_atencion', 0)
                                    ->count();

            $escritosSinAnexos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 4)
                                    ->where('en_atencion', 0)
                                    ->count();

            $demandaNueva = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 5)
                                    ->where('en_atencion', 0)
                                    ->count();

            $familiares = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 6)
                                    ->where('en_atencion', 0)
                                    ->count();
            $exhortos = Turno::where('casa_justicia_id', $request->sede)
                                    ->where('tipo_turno_id', 7)
                                    ->where('en_atencion', 0)
                                    ->count();

                        $object = new \stdClass();
                        $object->escritosConAnexos = $escritosConAnexos;
                        $object->apelaciones = $apelaciones;
                        $object->trabajadores = $trabajadores;
                        $object->escritosSinAnexos = $escritosSinAnexos;
                        $object->demandaNueva = $demandaNueva;
                        $object->familiares = $familiares;
                        $object->exhortos = $exhortos;

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
            $distrito_sede = CasaJusticia::find($request->id_sede);
            $fecha_hoy = $request->fecha;

            switch($request->id_sede)
            {
                case '1':
                    $oficialia = '9994';
                    $distrito = 'PUEBLA';
                break;
                case '2':
                    $oficialia = '9997';
                    $distrito = 'CHOLULA';
                break;
                case '3':
                    $oficialia = '9996';
                    $distrito = 'HUEJOTZINGO';
                break;
            }
            $currentDate = Carbon::now();

            $objectP = new \stdClass();
            $objectP->id_sede = $request->id_sede;
            $array_personas = array();
            $array_Promedios = array();
            $inicio = 8;
            $fin = 9;

            $date = Carbon::now();
            // $fecha_hoy=$date->toDateString();
            $fecha = new Carbon($date->toDateString() . '08:00:00');
            $hora_inicio = $fecha->toTimeString();
            $fecha->addHours(1);
            $hora_fin = $fecha->toTimeString();


            $suma_turnos = 0;
            $suma_salas = 0;
            $suma_internos = 0;
            $suma_rapidos = 0;
            $suma_demandas = 0;
            $suma_familiares = 0;
            $suma_exhortos = 0;

            $suma_turnos_general = 0;
            $suma_salas_general = 0;
            $suma_internos_general = 0;
            $suma_rapidos_general = 0;
            $suma_demandas_general = 0;
            $suma_familiares_general = 0;
            $suma_exhortos_general = 0;            
            $suma_totales_personas = 0;
            
            for($i = 1; $i < 8; $i++)
            {
                ///// ESCRITOS CON ANEXOS //////
                $suma_turnos = 0;
                $turnos = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 1)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_turnos = $turnos->count();


                foreach($turnos as $turno){

                    $mayor = new Carbon('2010-05-16 '.$turno->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$turno->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_turnos = $suma_turnos + $total_diferencia;
                }

                if($total_turnos == 0){
                    $promedio_turnos = 0;
                }else{
                    $promedio_turnos = $suma_turnos/$total_turnos;
                }
                $suma_turnos_general = $suma_turnos_general + $promedio_turnos;

                ///////////APELACIONES Y ESCRITOS SALAS ////////////////////

                $suma_salas = 0;

                $salas = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 2)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_salas = $salas->count();

                foreach($salas as $sala){

                    $mayor = new Carbon('2010-05-16 '.$sala->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$sala->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_salas = $suma_salas + $total_diferencia;
                }

                if($total_salas == 0){
                    $promedio_salas = 0;
                }else{
                    $promedio_salas = $suma_salas/$total_salas;
                }
                $suma_salas_general = $suma_salas_general + $promedio_salas;

                /////TRABAJADORES PODER JUDICIAL///////////
                $suma_internos = 0;

                $internos = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 3)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_internos = $internos->count();


                foreach($internos as $interno){

                    $mayor = new Carbon('2010-05-16 '.$interno->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$interno->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_internos = $suma_internos + $total_diferencia;
                }

                if($total_internos == 0){
                    $promedio_internos = 0;
                }else{
                    $promedio_internos = $suma_internos/$total_internos;
                }
                $suma_internos_general = $suma_internos_general + $promedio_internos;

                ///////ESCRITOS SIN ANEXOS//////

                $suma_rapidos = 0;

                $rapidas = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 4)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_rapidas = $rapidas->count();

                foreach($rapidas as $rapida){

                    $mayor = new Carbon('2010-05-16 '.$rapida->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$rapida->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_rapidos = $suma_rapidos + $total_diferencia;
                }

                if($total_rapidas == 0){
                    $promedio_rapidos = 0;
                }else{
                    $promedio_rapidos = $suma_rapidos/$total_rapidas;
                }
                $suma_rapidos_general = $suma_rapidos_general + $promedio_rapidos;

                //////// DEMANDA NUEVA ////////
                $suma_demandas = 0;
                $demandas = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 5)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_demandas = $demandas->count();

                foreach($demandas as $demanda){

                    $mayor = new Carbon('2010-05-16 '.$demanda->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$demanda->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_demandas = $suma_demandas + $total_diferencia;
                }

                if($total_demandas == 0){
                    $promedio_demandas = 0;
                }else{
                    $promedio_demandas = $suma_demandas/$total_demandas;
                }
                $suma_demandas_general = $suma_demandas_general + $promedio_demandas;

                //// ORALIDAD FAMILIAR /////
                $suma_familiares = 0;

                $familiares = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 6)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                $total_familiares = $familiares->count();

                foreach($familiares as $familiar){

                    $mayor = new Carbon('2010-05-16 '.$familiar->hora_atencion_inicio);
                    $menor = new Carbon('2010-05-16 '.$familiar->hora_registro);
                    $diferencia = $mayor->diffInSeconds($menor);
                    $total_diferencia = $diferencia/60;
                    $suma_familiares = $suma_familiares + $total_diferencia;
                }

                if($total_familiares == 0){
                    $promedio_familiares = 0;
                }else{
                    $promedio_familiares = $suma_familiares/$total_familiares;
                }
                $suma_familiares_general = $suma_familiares_general + $promedio_familiares;

                ////// EXHORTOS //////
                $suma_exhortos = 0;

                $exhortos = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('tipo_turno_id', 7)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->get();

                    $total_exhortos = $exhortos->count();

                    foreach($exhortos as $exhorto){

                        $mayor = new Carbon('2010-05-16 '.$exhorto->hora_atencion_inicio);
                        $menor = new Carbon('2010-05-16 '.$exhorto->hora_registro);
                        $diferencia = $mayor->diffInSeconds($menor);
                        $total_diferencia = $diferencia/60;
                        $suma_exhortos = $suma_exhortos + $total_diferencia;
                    }

                    if($total_exhortos == 0){
                        $promedio_exhortos = 0;
                    }else{
                        $promedio_exhortos = $suma_exhortos/$total_exhortos;
                    }

                $suma_exhortos_general = $suma_exhortos_general + $promedio_exhortos;

                //// GENERAAAAAALEEEEEEEEES ////

                $total_atendidos = Turno::where('hora_registro', '>=', $hora_inicio)
                                    ->where('hora_registro', '<', $hora_fin)
                                    ->where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->count();

                $suma_totales_personas = $suma_totales_personas + $total_atendidos;

                ///////////////////////////////////////////////////////////////////////////////
                
                $objectPromedios = new \stdClass();
                $objectPromedios->hora = $inicio.' a '.$fin;
                $objectPromedios->turno = bcdiv($promedio_turnos,'1',2).' min';
                $objectPromedios->sala = bcdiv($promedio_salas,'1',2).' min';
                $objectPromedios->interno = bcdiv($promedio_internos,'1',2).' min';
                $objectPromedios->demanda = bcdiv($promedio_demandas,'1',2).' min';
                $objectPromedios->aten_rapida = bcdiv($promedio_rapidos,'1',2).' min';
                $objectPromedios->o_familiar = bcdiv($promedio_familiares,'1',2).' min';
                $objectPromedios->exhorto = bcdiv($promedio_exhortos,'1',2).' min';
                array_push($array_Promedios, $objectPromedios);
                $objectPersonas = new \stdClass();
                $objectPersonas->hora = $inicio.' a '.$fin;
                $objectPersonas->totales = $total_atendidos;
                array_push($array_personas, $objectPersonas);

                $inicio++;
                $fin++;
                $hora_inicio = $fecha->toTimeString();
                $fecha->addHours(1);
                $hora_fin = $fecha->toTimeString();
            }

                $suma_turnos_general_promedio = bcdiv($suma_turnos_general,'1',2)/7;
                $suma_salas_general_promedio = bcdiv($suma_salas_general,'1',2)/7;
                $suma_internos_general_promedio = bcdiv($suma_internos_general,'1',2)/7;
                $suma_rapidos_general_promedio = bcdiv($suma_rapidos_general,'1',2)/7;
                $suma_demandas_general_promedio = bcdiv($suma_demandas_general,'1',2)/7;
                $suma_familiares_general_promedio = bcdiv($suma_familiares_general,'1',2)/7;
                $suma_exhortos_general_promedio = bcdiv($suma_exhortos_general,'1',2)/7;


            $objectTiempoTotales = new \stdClass();
            $objectTiempoTotales->texto = 'Total';
            $objectTiempoTotales->turno = bcdiv($suma_turnos_general_promedio,'1',2);
            $objectTiempoTotales->salas = bcdiv($suma_salas_general_promedio,'1',2);
            $objectTiempoTotales->internos = bcdiv($suma_internos_general_promedio,'1',2);
            $objectTiempoTotales->rapidos = bcdiv($suma_rapidos_general_promedio,'1',2);
            $objectTiempoTotales->demandas = bcdiv($suma_demandas_general_promedio,'1',2);
            $objectTiempoTotales->familiares = bcdiv($suma_familiares_general_promedio,'1',2);
            $objectTiempoTotales->exhorto = bcdiv($suma_exhortos_general_promedio,'1',2);

            $objectTotalPersonasAtendidas = new \stdClass();
            $objectTotalPersonasAtendidas->hora = 'Total';
            $objectTotalPersonasAtendidas->totales = $suma_totales_personas;

            $total_turnos_asignados = Turno::where('en_atencion', '!=' , 0)
                                    ->where('casa_justicia_id', $request->id_sede)
                                    ->where('fecha_registro', $fecha_hoy)
                                    ->count();
            
            // Objeto principal
            $objectP->fecha_consulta = $fecha_hoy;
            $objectP->distrito_sede = $distrito_sede->nombre;
            $objectP->distrito_sede_id = $distrito_sede->id;
            $objectP->estadisticas_horarios = $array_Promedios;
            $objectP->estadisticas_horarios_totales = $objectTiempoTotales;
            $objectP->personas_atendidas = $array_personas;
            $objectP->total_personas_atendidas = $objectTotalPersonasAtendidas;
            $objectP->total_turnos_asignados = $total_turnos_asignados;

            //Consultas 209 dia anterior(guardia)

            // $f= Carbon::now();
            // $fecha = $f->toDateString();
        
            // $fechaAnterior = $fecha->subDay();

            $promocionesRecibidas = DB::connection('mysql_209')->select("SELECT COUNT(CU) AS total FROM promociones_pen WHERE fecha='$fecha_hoy'  and oficialia = '$oficialia'");

            $demandasRecividas = DB::connection('mysql_209')->select("SELECT COUNT(CU) AS total FROM ocomun WHERE fecha='$fecha_hoy' AND distrito='$distrito'");

            $apelacionesRecividas = DB::connection('mysql_209')->select("SELECT COUNT(CU) AS total FROM ocomun WHERE fecha='$fecha_hoy' AND distrito='APELACION'");

            $objectP->totalPromociones = $promocionesRecibidas[0]->total;
            $objectP->totalDemandas = $demandasRecividas[0]->total;
            $objectP->totalApelaciones = $apelacionesRecividas[0]->total;
            
            
            // $fechaAnterior = $f->subDay()->toDateString();

            $existenPromocionesDiaAnterior = DB::connection('mysql_209')->select("SELECT COUNT(CU) AS total FROM promociones_pen WHERE fecha='".$fecha_hoy."' and hora>'15:00:00' and oficialia = '$oficialia'");
        
            if($existenPromocionesDiaAnterior[0]->total > 0)
            {

                $promocionesDiaAnterior = DB::connection('mysql_209')->select("SELECT ID,juzgados.descrip AS JUZGADO,HORA,FECHA FROM promociones_pen,juzgados 
                WHERE  fecha='".$fecha_hoy."' and hora>'15:00:00' and oficialia = '$oficialia' and promociones_pen.juzgado = juzgados.codigo");

                $objectP->promocionesDiaAnterior = $promocionesDiaAnterior;
                $num_promociones = count($promocionesDiaAnterior);
                $objectP->num_promociones_dia_anterior = $num_promociones;
                $objectP->num_tablas = ceil($num_promociones/30);
            }
            else
            { 
                $objectP->promocionesDiaAnterior = [];
                $objectP->num_promociones_dia_anterior = 0;
                $objectP->num_tablas = 0;
            }
            
            $existenDemandasDiaAnterior = DB::connection('mysql_209')->select("SELECT count(folio) as total FROM ocomun,juzgados WHERE ocomun.juzgado = juzgados.codigo and
            fecha='".$fecha_hoy."' and substr(hora,LENGTH(Hora)-2)=' pm' AND replace(substr(hora,1,2),':','')!=12
            and replace(substr(hora,1,2),':','')>=3 and ocomun.distrito = '$distrito'");

            if($existenDemandasDiaAnterior[0]->total > 0)
            {
                $demandasDiaAnterior = DB::connection('mysql_209')->select("SELECT folio AS ID,juzgados.descrip AS JUZGADO,HORA,FECHA FROM ocomun,juzgados WHERE 
                ocomun.juzgado = juzgados.codigo and fecha='".$fecha_hoy."' and substr(hora,LENGTH(Hora)-2)=' pm' AND replace(substr(hora,1,2),':','')!=12
                and replace(substr(hora,1,2),':','')>=3 and ocomun.distrito = '$distrito'");
    
                $objectP->demandasDiaAnterior = $demandasDiaAnterior;
            }
            else
            { 
                $objectP->demandasDiaAnterior = [];
            }

            //Custom Header
            PDF::setHeaderCallback(function($pdf) {
                $pdf->SetFont('helvetica', 'B', 11);

                // Header
                $header_image_file = public_path() . '/img/header_pdf.png';           
                $pdf->Image($header_image_file, 0,0,210,40);
            });

            // Custom Footer
            PDF::setFooterCallback(function($pdf) use ($currentDate) {
                $pdf->SetFont('helvetica', 'I', 8);

                $pdf->MultiCell(55, 5, 'Fecha y hora de reporte:', 0, '', 0, 1, '10', '275', true);
                $pdf->MultiCell(55, 5, $currentDate->toDateString() . ' ' . $currentDate->toTimeString(), 0, '', 0, 1, '10', '279', true);
                // Footer
                $footer_image_file = public_path() . '/img/footer_pdf.png';
                $pdf->Image($footer_image_file, 50,268,160,30);

                $pdf->Cell(0, 10, '      Página '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
                // $pdf->MultiCell(1, 1, '[LEFT]', 0, 'L', 1, 0, '10', '150', true);
            });

            $PDF_MARGIN_LEFT = 5;
            $PDF_MARGIN_TOP = 25;
            $PDF_MARGIN_RIGHT = 5;
            $PDF_MARGIN_BOTTOM = 20;
            
            PDF::SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT,$PDF_MARGIN_BOTTOM);
            PDF::SetAutoPageBreak(true, $PDF_MARGIN_BOTTOM);
            PDF::SetTitle('Reporte');
            PDF::AddPage('P', 'A4');
                        
            $view = View::make('pdf.reporte_tiempo_real', compact('objectP'));
            $html_content = $view->render();

            PDF::writeHTML($html_content, true, false, true, false, '');

            ob_end_clean();
    
            PDF::Output('Reporte_Turnos_Oficialia_'. $distrito_sede->nombre .'.pdf', 'I');
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
