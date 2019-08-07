<?php

namespace App\Http\Controllers;
use DateTime;
use DateInterval;

class helpers extends Controller
{
    public static function getDateNow(){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = new DateTime("NOW");
        return $objFechaActual;
    }
    
    public static function getCurrentYear(){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = new DateTime("NOW");;
        (string)$anioActual = $objFechaActual->format("Y");
        
        return $anioActual;
    }
    
    public static function getCurrentMonth(){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = new DateTime("NOW");;
        (string)$mesActual = $objFechaActual->format("n");
        
        return $mesActual;
    }
    
    public static function getLastYear(){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = new DateTime("NOW");;
        (string)$fechaActual = $objFechaActual->format("Y-m-d");
        (string)$anioAnterior = $objFechaActual->sub(new DateInterval("P1Y"))->format("Y");
        
        return $anioAnterior;
    }
    
       
    public static function calcularDiferenciaEnAnios($fecha){
        date_default_timezone_set('America/Bogota');
        $fechaActual = new DateTime("NOW");
        $fechaComparar = new DateTime($fecha);
        $diferencia = $fechaActual->diff($fechaComparar);
        return $diferencia->format("%Y");
    }
    
    public static function getAnioFecha($fecha){
        date_default_timezone_set('America/Bogota');
        $objFecha = new DateTime($fecha);
        return $objFecha->format("Y");
    }
    
    public static function getMesFecha($fecha){
        date_default_timezone_set('America/Bogota');
        $objFecha = new DateTime($fecha);
        return $objFecha->format("m");
    }
    
    public static function getDiaFecha($fecha){
        date_default_timezone_set('America/Bogota');
        $objFecha = new DateTime($fecha);
        return $objFecha->format("d");
    }
    
    public static function buscarCodigoDiagnostico($q){
        if($q === ""){return;}
        $archivoCodigos = simplexml_load_file(base_path("archivosXML/Ausentismo/diagnosticosAusencia.xml"));
        $codigos=$archivoCodigos->xpath("//Ausentismo/Diagnostico");
        $count=0;
        foreach ($codigos as $codigo) {
            if (stristr(substr($codigo->lineaCodigo, 0, strlen($q)),$q) || stristr(substr($codigo->lineaDescripcion, 0, strlen($q)),$q)) {
                //$data = $archivoCodigos->xpath("//Ausentismo/Diagnostico[lineaCodigo = '$codigoArchivo']");
                if($count <=9){
                    echo "<option class='option-datalist' value='{$codigo->lineaCodigo}'>{$codigo->lineaDescripcion}<option/>";
                }
                $count++;
            }
        }
    }
    
    public static function meses_de_numero_a_texto($valor){
        switch ($valor) {
            case "0":$mes = "Enero";break;
            case "1":$mes = "Febrero";break;
            case "2":$mes = "Marzo";break;
            case "3":$mes = "Abril";break;
            case "4":$mes = "Mayo";break;
            case "5":$mes = "Junio";break;
            case "6":$mes = "Julio";break;
            case "7":$mes = "Agosto";break;
            case "8":$mes = "Septiembre";break;
            case "9":$mes = "Octubre";break;
            case "10":$mes = "Noviembre";break;
            case "11":$mes = "Diciembre";break;
            default:break;
        }
        return $mes;
            
    }
    
    public static function traducirMeses($valor){
        switch ($valor) {
            case "January":$mes = "Enero";break;
            case "February":$mes = "Febrero";break;
            case "March":$mes = "Marzo";break;
            case "April":$mes = "Abril";break;
            case "May":$mes = "Mayo";break;
            case "June":$mes = "Junio";break;
            case "July":$mes = "Julio";break;
            case "August":$mes = "Agosto";break;
            case "September":$mes = "Septiembre";break;
            case "October":$mes = "Octubre";break;
            case "November":$mes = "Noviembre";break;
            case "December":$mes = "Diciembre";break;
            default:break;
        }
        return $mes;
            
    }
    
    
    public static function traducirMesesAlIngles($valor){
        $mes="";
        switch ($valor) {
            case "Enero":$mes = "January";break;
            case "Febrero":$mes = "February";break;
            case "Marzo":$mes = "March";break;
            case "Abril":$mes = "April";break;
            case "Mayo":$mes = "May";break;
            case "Junio":$mes = "June";break;
            case "Julio":$mes = "July";break;
            case "Agosto":$mes = "August";break;
            case "Septiembre":$mes = "September";break;
            case "Octubre":$mes = "October";break;
            case "Noviembre":$mes = "November";break;
            case "Diciembre":$mes = "December";break;
            default:break;
        }
        return $mes;
            
    }
    
    public static function traducirDias($valor){
        switch ($valor) {
            case "Monday":$dia="Lunes";break;
            case "Tuesday":$dia="Martes";break;
            case "Wednesday":$dia="Miercoles";break;
            case "Thursday":$dia="Jueves";break;
            case "Friday":$dia = "Viernes";break;
            case "Saturday":$dia = "Sabado";break;
            case "Sunday":$dia = "Domingo";break;
        }
        return $dia;
    }
    
    public static function obtenerNumeroMes($textMes){
        switch ($textMes) {
            case "Enero":$numeroMes=0;break;
            case "Febrero":$numeroMes=1;break;
            case "Marzo":$numeroMes=2;break;
            case "Abril":$numeroMes=3;break;
            case "Mayo":$numeroMes = 4;break;
            case "Junio":$numeroMes = 5;break;
            case "Julio":$numeroMes = 6;break;
            case "Agosto":$numeroMes = 7;break;
            case "Septiembre":$numeroMes = 8;break;
            case "Octubre":$numeroMes = 9;break;
            case "Noviembre":$numeroMes = 10;break;
            case "Diciembre":$numeroMes = 11;break;
        }
        return $numeroMes;
    }
}
