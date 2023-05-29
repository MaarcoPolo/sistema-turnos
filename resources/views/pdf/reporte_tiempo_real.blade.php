<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turnos Oficialia</title>
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
    <p class="subtitulo">Estadística de Oficialía Común de Partes del distrito de Puebla</p>
    <table>
        <tr>
            <th colspan="2" class="encabezado_principal">Total de turnos asignados</th>
        </tr>
        <tr>
            <td colspan="2" class="dato_principal">681</td>
        </tr>
        <tr>
            <td class="dato_secundario">Demandas recibidas</td>
            <td class="dato_secundario">132</td>
        </tr>
        <tr>
            <td class="dato_secundario">Apelaciones recibidas</td>
            <td class="dato_secundario">13</td>
        </tr>
        <tr>
            <td class="dato_secundario">Promociones recibidas</td>
            <td class="dato_secundario">918</td>
        </tr>
    </table><br><br><table>
        <tr>
            <th colspan="7" class="encabezado_principal">Tiempos de atención</th>
        </tr>
        <tr>
            <td rowspan="2" colspan="1" class="encabezado_secundario">Hora</td>
            <td colspan="6" class="encabezado_secundario">Tipo de turno</td>
        </tr>
        <tr>
            <td colspan="1" class="encabezado_secundario">Turno</td>
            <td colspan="1" class="encabezado_secundario">Sala</td>
            <td colspan="1" class="encabezado_secundario">Interno</td>
            <td colspan="1" class="encabezado_secundario">Demanda</td>
            <td colspan="1" class="encabezado_secundario">Atn. rápida</td>
            <td colspan="1" class="encabezado_secundario">O. familiar</td>
        </tr>
        @foreach ($objectP->estadisticas_horarios as $estadistica_horario)
            <tr>
                <td class="dato_secundario">{{ $estadistica_horario->hora }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->turno }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->sala }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->interno }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->demanda }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->aten_rapida }}</td>
                <td class="dato_secundario">{{ $estadistica_horario->o_familiar }}</td>
            </tr>
        @endforeach
        <tr>
            <td class="dato_principal">TOTAL</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->turno }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->salas }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->internos }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->rapidos }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->demandas }}</td>
            <td class="dato_principal">{{ $objectP->estadisticas_horarios_totales->familiares }}</td>
        </tr>
    </table><br><br><table>
        <tr>
            <th colspan="2" class="encabezado_principal">Personas atendidas</th>
        </tr>
        <tr>
            <td class="encabezado_secundario">Hora</td>
            <td class="encabezado_secundario">No. usuarios</td>
        </tr>
        <tr>
            <td class="dato_secundario">08 a 09</td>
            <td class="dato_secundario">37</td>
        </tr>
        <tr>
            <td class="dato_secundario">09 a 10</td>
            <td class="dato_secundario">73</td>
        </tr>
        <tr>
            <td class="dato_secundario">10 a 11</td>
            <td class="dato_secundario">93</td>
        </tr>
        <tr>
            <td class="dato_secundario">11 a 12</td>
            <td class="dato_secundario">100</td>
        </tr>
        <tr>
            <td class="dato_secundario">12 a 13</td>
            <td class="dato_secundario">115</td>
        </tr>
        <tr>
            <td class="dato_secundario">13 a 14</td>
            <td class="dato_secundario">134</td>
        </tr>
        <tr>
            <td class="dato_secundario">14 a 15</td>
            <td class="dato_secundario">118</td>
        </tr>
        <tr>
            <td class="dato_principal">TOTAL</td>
            <td class="dato_principal">670</td>
        </tr>
        <tr>
            <td class="dato_secundario">Después de las 15 h</td>
            <td class="dato_secundario">0</td>
        </tr>
    </table>
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
        <tr>
            <td colspan="1" class="dato_secundario">1</td>
            <td colspan="1" class="dato_secundario">699093</td>
            <td colspan="1" class="dato_secundario">JUZGADO ORAL FAMILIAR PUEBLA</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">2</td>
            <td colspan="1" class="dato_secundario">699094</td>
            <td colspan="1" class="dato_secundario">JUZGADO SEPTIMO ESPECIALIZADO EN MATERIA MERCANTIL</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">3</td>
            <td colspan="1" class="dato_secundario">699095</td>
            <td colspan="1" class="dato_secundario">JUZGADO SEXTO FAMILIAR</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">4</td>
            <td colspan="1" class="dato_secundario">699096</td>
            <td colspan="1" class="dato_secundario">JUZGADO CUARTO ESPECIALIZADO EN MATERIA CIVIL</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">5</td>
            <td colspan="1" class="dato_secundario">699097</td>
            <td colspan="1" class="dato_secundario">JUZGADO QUINTO FAMILIAR</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">6</td>
            <td colspan="1" class="dato_secundario">699098</td>
            <td colspan="1" class="dato_secundario">JUZGADO CUARTO FAMILIAR</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">7</td>
            <td colspan="1" class="dato_secundario">699099</td>
            <td colspan="1" class="dato_secundario">JUZGADO PRIMERO FAMILIAR</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">8</td>
            <td colspan="1" class="dato_secundario">699100</td>
            <td colspan="1" class="dato_secundario">JUZGADO SEXTO FAMILIAR</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">9</td>
            <td colspan="1" class="dato_secundario">699101</td>
            <td colspan="1" class="dato_secundario">JUZGADO OCTAVO ESPECIALIZADO EN MATERIA MERCANTIL</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
        <tr>
            <td colspan="1" class="dato_secundario">10</td>
            <td colspan="1" class="dato_secundario">699102</td>
            <td colspan="1" class="dato_secundario">TERCERA SALA PENAL</td>
            <td colspan="1" class="dato_secundario">15:00:25</td>
        </tr>
    </table>
</body>
</html>