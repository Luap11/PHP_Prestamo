<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Request-With Conent-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf8');

include '../Controllers/BD/coneccion.php';
include '../Controllers/DAO/DCliente.php';

//try{
    $dcli = new DCliente();
    $tipo = isset($_REQUEST['tipo'])!=0?$_REQUEST['tipo']:'';
    if($tipo == 'lista'){
        $bus = $_REQUEST["txtbus"];
        $dcli->getList($bus);
        echo json_encode($dcli->getArray());
    }
//}catch(Exception ex){

//}
?>