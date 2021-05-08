<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Request-With Conent-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf8');

include '../Controllers/BD/conexion.php';
include '../Controllers/DAO/DEmpleado.php';


$dcli = new DEmpleado();
$tipo = isset($_REQUEST['tipo'])!=0?$_REQUEST['tipo']:'';
if($tipo == 'lista'){
    $bus = $_REQUEST["txtbus"];
    $dcli->getList($bus);
    echo json_encode($dcli->getArray());
}else if($tipo == 'update'){
    $id = $_REQUEST['id'];
    $nom = $_REQUEST['nom'];
    $ape = $_REQUEST['ape']; 
    $cargo = $_REQUEST['cargo'];
    $sueldo = $_REQUEST['sueldo'];
    $codDist = $_REQUEST['codDist'];
    $dcli->updateEmpleado($id,$nom,$ape,$cargo,$sueldo,$codDist);
    echo json_encode($dcli->getArray());
}else if($tipo == 'delete'){
    $id = $_REQUEST["id"];
    $dcli->deleteEmpleado($id);
    echo json_encode($dcli->getArray());
}else if($tipo == 'insert'){
    $nom = $_REQUEST['nom'];
    $ape = $_REQUEST['ape'];
    $cargo = $_REQUEST['cargo'];
    $sueldo = $_REQUEST['sueldo'];
    $codDist = $_REQUEST['codDist'];
    $dcli->insertEmpleado($nom,$ape,$cargo,$sueldo,$codDist);
    echo json_encode($dcli->getArray());
}