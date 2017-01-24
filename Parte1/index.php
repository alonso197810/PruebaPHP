<?php

$opcion = $_GET["opcion"];
$valor = $_GET["valor"];
if(is_string($valor))
	$valor = urldecode($valor); 
include 'ChangeString.php';
include 'CompleteRange.php';
include 'ClearPar.php';
$changeString = new ChangeString();
$completeRange = new CompleteRange();
$clearPar = new ClearPar();
switch ($opcion) {
    case 1:
        $respuesta = $changeString->build($valor);
        break;
    case 2:
        $respuesta = $completeRange->build($valor);        
        break;
    case 3:
        $respuesta = $clearPar->build($valor);        
        break;
	default:
       $respuesta = "Opcion no valida";        
}
if($opcion ==2)
	print_r($respuesta);
else
	echo $respuesta;