<?php
include_once '../PHPExcel/Classes/PHPExcel.php';
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = $_FILES['excelfile']['name'];
$tipo = $_FILES['excelfile']['type'];
$tamanio = $_FILES['excelfile']['size'];
$ruta = $_FILES['excelfile']['tmp_name'];
$destino = "./../archivos/copia -" . $nombre;

if ($nombre != "") {
    if (copy($ruta, $destino)) {
    }else{
        echo "Error";
    }
}

$name = "excel/copia -" . $nombre;

//Cargar el archivo
$excel  = PHPExcel_IOFactory::load($name);
//Cargar la hoja de calculo
$excel->setActiveSheetIndex(0);
//Obtener el numero de filas del archivo de excel
$numeroFila = $excel->setActiveSheetIndex(0)->getHighestRow();
var_dump($numeroFila);

for ($i = 2; $i <= $numeroFila; $i++) {

    $codigo1 = $excel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
    $codigo2 = $excel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
    $producto = $excel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
    $marca = $excel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
    $modelo = $excel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
    $anio = $excel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
    $precio = $excel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
    $notas = $excel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();

    //Validar si la variable del primer parametros esta vacia
    if (empty($codigo1)){
        echo 'La variable viene vacia no se inserto nada';
    }else{
        //insertar en la BD MYsql
        $consulta = "INSERT INTO producto(codigo1, codigo2, nombre, marca, modelo, anio, precio, descripcion) VALUES('$codigo1', '$codigo2', '$producto', '$marca', '$modelo', '$anio', '$precio', '$notas')";
        $resultado = $conexion->prepare($consulta);
    }    
    try {
        $resultado->execute();
    } catch (Exception $e) {
        echo $e;
    }

    $consulta = "SELECT id, codigo1 FROM producto ORDER BY id DESC LIMIT 1";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
}
