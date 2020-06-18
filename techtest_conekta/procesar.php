<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("clases.php");

$texto = $_POST['comando'];
$ultimocom = $_POST['ultimoComando'];
$tabla = $_POST['tabla']; 

$Comando = new Comando();
$valido = $Comando->validaComando($texto);

if($valido == "N"){
    $resultado = "Comando Inválido";
} else {
    switch($valido){
        case "I":
            //logica para crear la tabla
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "C":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "L":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "V":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "H":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "F":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "S":
            $tabNueva = new Tabla();
            $resultado = $tabNueva->crearTabla($texto,$tabla);
            echo json_encode($resultado);
        break;
        case "X":
            $resultado = "X";
            echo json_encode($resultado);
        break;
    }
    
}

?>