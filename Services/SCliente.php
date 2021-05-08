<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Request-With Conent-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf8');

include '../Controllers/BD/conexion.php';
include '../Controllers/DAO/DCliente.php';

//try{
    $dcli = new DCliente();
    $tipo = isset($_REQUEST['tipo'])!=0?$_REQUEST['tipo']:'';
    if($tipo == 'lista'){
        $bus = $_REQUEST["txtbus"];
        $dcli->getList($bus);
        echo json_encode($dcli->getArray());
    }else if($tipo == 'update'){
        $nom = $_REQUEST['nom'];
        $ape = $_REQUEST['ape'];
        $dni = $_REQUEST['dni'];
        $cod = $_REQUEST['cod'];
        $codDist = $_REQUEST['codDist'];
        $dcli->updateCliente($cod,$nom,$ape,$dni,$codDist);
        echo json_encode($dcli->getArray());
    }else if($tipo == 'delete'){
        $cod = $_REQUEST["cod"];
        $dcli->deleteCliente($cod);
        echo json_encode($dcli->getArray());
    }else if($tipo == 'insert'){
        $nom = $_REQUEST['nom'];
        $ape = $_REQUEST['ape'];
        $dni = $_REQUEST['dni'];
        $codDist = $_REQUEST['codDist'];
        $dcli->insertCliente($nom,$ape,$dni,$codDist);
        echo json_encode($dcli->getArray());
    }
//}catch(Exception ex){

//}
