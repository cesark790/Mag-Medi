<?php
date_default_timezone_set("America/Mexico_City");
function changemes($valor)
{
    switch ($valor) {
        case 1: return "Enero"; break;
        case 2: return "Febrero"; break;
        case 3: return "Marzo"; break;
        case 4: return "Abril"; break;
        case 5: return "Mayo"; break;
        case 6: return "Junio"; break;
        case 7: return "Julio"; break;
        case 8: return "Agosto"; break;
        case 9: return "Septiembre"; break;
        case 10: return "Octubre"; break;
        case 11: return "Noviembre"; break;
        case 12: return "Diciembre"; break;
        case 13: return "Anual"; break;
    }
}

function fechaletra($fecha)
{
    //formato aaaa-mm-dd
    $x = explode("-", $fecha);
    $fecha = $x[2]."-".$x[1]."-".$x[0];
    setlocale(LC_TIME, "Spanish");
    return utf8_encode(ucfirst(strftime('%A %d de %B del %Y',  strtotime($fecha))));  
}

function fechamysql($fecha)
{
    $x = explode("-", $fecha);
    $fecha = $x[2]."-".$x[1]."-".$x[0];
    return $fecha;
}
