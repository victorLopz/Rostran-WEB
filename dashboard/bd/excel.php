<?php
$nombre = $_FILES['pdfimport']['name'];
$tipo = $_FILES['pdfimport']['type'];
$tamanio = $_FILES['pdfimport']['size'];
$ruta = $_FILES['pdfimport']['tmp_name'];
$destino = "./../archivos/COPIA -" . $nombre;

if ($nombre != "") {
    if (copy($ruta, $destino)) {
    }else{
        echo "Error";
    }
}else{
    echo "NO HAY ARCHIVOS";
}
