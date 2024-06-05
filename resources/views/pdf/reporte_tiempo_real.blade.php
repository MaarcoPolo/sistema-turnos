<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turnos Oficialia</title>
    @php
     $prueba = $objectP->distrito_sede_id;
    @endphp
    <style>
        table {
            border-collapse: collapse;
            /* width: auto; */
            /* border: 1px solid black; */
        }
        table, td, th{
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
            padding: 2.5px;
        }
        table > tr > td {
            color: black;
            /* font-family: Arial, Helvetica, sans-serif; */
            font-size: 10px;
        }

        .titulo {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
        }

        .encabezado_principal {
            background-color: #6a73a0;
            text-align: center;
            color: #ffffff;
            font-weight: bold;
            font-size: 11px;
        }

        .encabezado_secundario {
            background-color: #6a73a0;
            text-align: center;
            color: #ffffff;
            font-size: 11px;
        }

        .dato_principal {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }

        .dato_secundario {
            text-align: center;
        }

        .pagebreak { 
            /* page-break-before: always;  */
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <br>
    <p class="titulo">Reporte del sistema de control de turnos para la atención al público</p>
    <p class="subtitulo">Estadística de Oficialía Común de Partes del distrito de {{$objectP->distrito_sede}}</p>
    <table>
        <tr>
            <th colspan="2" class="encabezado_principal">Total de turnos asignados</th>
        </tr>
        <tr>
            <td colspan="2" class="dato_principal">{{$objectP->total_turnos_asignados}}</td>
        </tr>
        <tr>
            <td class="dato_secundario">Demandas recibidas</td>
            <td class="dato_secundario">{{$objectP->totalDemandas}}</td>
        </tr>
        @if($objectP->id_sede == 1)
            <tr>
                <td class="dato_secundario">Apelaciones recibidas</td>
                <td class="dato_secundario">{{$objectP->totalApelaciones}}</td>
            </tr>
        @endif
        <tr>
            <td class="dato_secundario">Promociones recibidas</td>
            <td class="dato_secundario">{{$objectP->totalPromociones}}</td>
        </tr>
    </table><br><br><table>
        <tr>
            <th colspan="8" class="encabezado_principal">Tiempos de atención</th>
        </tr>
        <tr>
            <td rowspan="2" colspan="1" class="encabezado_secundario">Hora</td>
            <td colspan="7" class="encabezado_secundario">Tipo de turno</td>
        </tr>
        <tr>
            
            @if ($prueba == 1)
            <td colspan="1" class="encabezado_secundario">Esc s/a</td>
            <td colspan="1" class="encabezado_secundario">Apel y Esc</td> 
            <td colspan="1" class="encabezado_secundario">Trab PJ</td> 
            <td colspan="1" class="encabezado_secundario">Esc c/a</td> 
            <td colspan="1" class="encabezado_secundario">Dem nueva</td>
            <td colspan="1" class="encabezado_secundario">O. familiar</td>
            <td colspan="1" class="encabezado_secundario">Exhortos</td>
            @endif
            
            @if ($prueba == 2)
            <td colspan="2" class="encabezado_secundario">Turno</td>
            <td colspan="2" class="encabezado_secundario">Demanda</td>
            <td colspan="2" class="encabezado_secundario">O. familiar</td>
            @endif
            @if ($prueba == 3)
            <td colspan="3" class="encabezado_secundario">Turno</td>
            <td colspan="3" class="encabezado_secundario">Demanda</td>
            @endif
            
             
            
            
        </tr>
        @foreach ($objectP->estadisticas_horarios as $estadistica_horario)
            <tr>
                
                @if ($prueba == 1)
                <td class="dato_secundario">{{ $estadistica_horario->hora }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->turno }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->sala }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->interno }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->demanda }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->aten_rapida }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->o_familiar }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->exhorto }}</td>
                @endif
                
                @if ($prueba == 2)
                <td class="dato_secundario">{{ $estadistica_horario->hora }}</td>
                <td colspan="2" class="dato_secundario">{{ $estadistica_horario->turno }}</td>
                <td colspan="2" class="dato_secundario">{{ $estadistica_horario->demanda }}</td>
                <td colspan="2" class="dato_secundario">{{ $estadistica_horario->o_familiar }}</td>
                @endif
                @if ($prueba == 3)
                <td class="dato_secundario">{{ $estadistica_horario->hora }}</td>
                <td colspan="3" class="dato_secundario">{{ $estadistica_horario->turno }}</td>
                <td colspan="3" class="dato_secundario">{{ $estadistica_horario->demanda }}</td>
                @endif
                
                
            </tr>
        @endforeach
        <tr>
            <td class="dato_principal">TOTAL</td>
            
            @if ($prueba == 1)
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->turno }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->salas }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->internos }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->demandas }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->rapidos }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->familiares }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->exhorto }}</td>
            @endif
            
            @if ($prueba == 2)
            <td colspan="2" class="dato_principal">{{ $objectP->estadisticas_horarios_totales->turno }}</td>
            <td colspan="2" class="dato_principal">{{ $objectP->estadisticas_horarios_totales->demandas }}</td>
            <td colspan="2" class="dato_principal">{{ $objectP->estadisticas_horarios_totales->familiares }}</td>
            @endif
            @if ($prueba == 3)
            <td colspan="3" class="dato_principal">{{ $objectP->estadisticas_horarios_totales->turno }}</td>
            <td colspan="3" class="dato_principal">{{ $objectP->estadisticas_horarios_totales->demandas }}</td>
            @endif
            
        </tr>
    </table><br><br><table>
        <tr>
            <th colspan="2" class="encabezado_principal">Personas atendidas</th>
        </tr>
        <tr>
            <td class="encabezado_secundario">Hora</td>
            <td class="encabezado_secundario">No. usuarios</td>
        </tr>
        @foreach($objectP->personas_atendidas as $personas_atendidas)
            <tr>
                <td class="dato_secundario">{{ $personas_atendidas->hora }}</td>
                <td class="dato_secundario">{{ $personas_atendidas->totales }}</td>
            </tr>
        @endforeach
        <tr>
            <td class="dato_principal">{{ $objectP->total_personas_atendidas->hora }}</td>
            <td class="dato_principal">{{ $objectP->total_personas_atendidas->totales }}</td>
        </tr>
        {{-- <tr>
            <td class="dato_secundario">Después de las 15 h</td>
            <td class="dato_secundario">0</td>
        </tr> --}}
    </table>
    
    @php
        $aux_key = 0;
    @endphp
    @for($i=0; $i<$objectP->num_tablas; $i++)
        @php
            $aux_cont = 0;
        @endphp
        <div class="pagebreak"></div>
        <br><br><br><br><table>
            <tr>
                <th colspan="4" class="encabezado_principal">Listado de Promociones</th>
            </tr>
            <tr>
                <td colspan="1" class="encabezado_secundario" style="width: 5%;">No.</td>
                <td colspan="1" class="encabezado_secundario" style="width: 10%;">Folio</td>
                <td colspan="1" class="encabezado_secundario" style="width: 75%;">Juzgado</td>
                <td colspan="1" class="encabezado_secundario" style="width: 10%;">Hora</td>
            </tr>
            @for($j=0; $j<$objectP->num_promociones_dia_anterior; $j++)
                @if($aux_cont < 30 && $aux_key < $objectP->num_promociones_dia_anterior)
                    <tr>
                        <td colspan="1" class="dato_secundario">{{$aux_key+1}}</td>
                        <td colspan="1" class="dato_secundario">{{$objectP->promocionesDiaAnterior[$aux_key]->ID}}</td>
                        <td colspan="1" class="dato_secundario">{{$objectP->promocionesDiaAnterior[$aux_key]->JUZGADO}}</td>
                        <td colspan="1" class="dato_secundario">{{$objectP->promocionesDiaAnterior[$aux_key]->HORA}}</td>
                    </tr>
                    @php
                        $aux_cont = $aux_cont + 1;
                        $aux_key = $aux_key + 1;
                    @endphp
                @endif
            @endfor
        </table>
    @endfor
    <div class="pagebreak"></div>
    <br><br><br><br><table>
        <tr>
            <th colspan="4" class="encabezado_principal">Listado de Demandas</th>
        </tr>
        <tr>
            <td colspan="1" class="encabezado_secundario" style="width: 5%;">No.</td>
            <td colspan="1" class="encabezado_secundario" style="width: 10%;">Folio</td>
            <td colspan="1" class="encabezado_secundario" style="width: 75%;">Juzgado</td>
            <td colspan="1" class="encabezado_secundario" style="width: 10%;">Hora</td>
        </tr>
        @foreach($objectP->demandasDiaAnterior as $key => $demanda)
            <tr>
                <td colspan="1" class="dato_secundario">{{$key+1}}</td>
                <td colspan="1" class="dato_secundario">{{$demanda->ID}}</td>
                <td colspan="1" class="dato_secundario">{{$demanda->JUZGADO}}</td>
                <td colspan="1" class="dato_secundario">{{$demanda->HORA}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>