<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$opcion = $_POST["opcion"];

switch($opcion){
    case 1: //alta
    
        $codigo1 = $_POST["codigo1"];
        $codigo2 = $_POST["codigo2"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelopresentacion"];
        $anio = $_POST["anio"]; 
        $precio = $_POST["pventa"];
        $descripcion = $_POST["comentario"];

        $consulta = "INSERT INTO producto(nombre, codigo1, codigo2, marca, modelo, precio, anio, descripcion) VALUES('$nombre', '$codigo1', '$codigo2', '$marca', '$modelo', '$precio', '$anio', '$descripcion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($resultado){
            $data = "GUARDADO";
        }else{
           $data=  "ERROR";
        }

        break;

    case 2: //modificación
        
        $id = $_POST["id"];
        $codigo1 = $_POST["codigo1"];
        $codigo2 = $_POST["codigo2"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelopresentacion"];
        $anio = $_POST["anio"]; 
        $precio = $_POST["precio"];
        $descripcion = $_POST["comentario"];

        $consulta = "SELECT precio FROM producto WHERE id= '$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $precioAnterior = $data[0]["precio"];

        $consulta = "SELECT precio as precioviejo FROM historialprecio WHERE id = (SELECT max(id) FROM historialprecio WHERE producto_id = '$id')";      
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $preciohis = $data[0]["precioviejo"];

        if($precio != $precioAnterior){
        
            $consulta = "INSERT INTO historialprecio(precio, producto_id) VALUES('$precioAnterior', '$id')";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "UPDATE producto SET codigo1='$codigo1', codigo2='$codigo2', nombre='$nombre', marca = '$marca', modelo = '$modelo', anio= '$anio', precio = '$precio', descripcion = '$descripcion' WHERE id='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();       
        
        }else{
            $consulta = "UPDATE producto SET codigo1='$codigo1', codigo2='$codigo2', nombre='$nombre', marca = '$marca', modelo = '$modelo', anio= '$anio', descripcion = '$descripcion' WHERE id='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        }

        $consulta = "SELECT id, codigo1, codigo2, nombre, marca, modelo, precio, anio, descripcion FROM producto WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        break;     
}

$data = json_encode($data, JSON_UNESCAPED_UNICODE);

print_r($data); //enviar el array final en formato json a JS
$conexion = NULL;