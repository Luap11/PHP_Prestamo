<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Request-With Conent-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf8');

include '../Controllers/BD/coneccion.php';
include '../Controllers/DAO/DTipo_Cambio.php';


$dcli = new DTipoCambio();
$tipo = isset($_REQUEST['tipo'])!=0?$_REQUEST['tipo']:'';
if($tipo == 'lista'){
    $bus = $_REQUEST["txtbus"];
    $dcli->getList($bus);
    echo json_encode($dcli->getArray());
}else if($tipo == 'update'){
    $nom = $_REQUEST['nom'];
    $cod = $_REQUEST['cod'];
    $monto = $_REQUEST['monto'];
    $dcli->updateTipoCambio($cod,$nom,$monto);
    echo json_encode($dcli->getArray());
}else if($tipo == 'delete'){
    $cod = $_REQUEST["cod"];
    $dcli->deleteTipoCambio($cod);
    echo json_encode($dcli->getArray());
}else if($tipo == 'insert'){
    $nom = $_REQUEST['nom'];
    $monto = $_REQUEST['monto'];
    $dcli->insertTipoCambio($nom,$monto);
    echo json_encode($dcli->getArray());
}