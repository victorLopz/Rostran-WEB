<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_POST['valordeConsulta'])) ? $_POST['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE producto SET isSelected = '1' WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 2:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE producto SET esVisible = '0' WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        break;
    case 3:
 
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE producto SET isSelected = 0";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 4:
        
        $consulta = "SELECT id, codigo1, nombre, marca, precio FROM producto as pro WHERE pro.isSelected = 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
        break;

    case 5:
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';

        $consulta = "UPDATE producto SET isSelected = '0' WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        break;
    case 6:
            
        $consulta = "SELECT SUM(precio) as sumat FROM producto where isSelected = 1";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;            
        break;
    case 7:

        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $consulta = "SELECT precio FROM historialprecio WHERE id = (SELECT max(id) FROM historialprecio WHERE producto_id = '$id')";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;   
        break;
}