<?php
class Conexion{
     public static function Conectar(){
    
        $valor = true;

        if($valor){
            define('servidor','localhost');
            define('nombre_bd','u122030778_autopartesrost');
            define('usuario','root');
            define('password',''); 
        }else{
            define('servidor', 'localhost');
            define('nombre_bd', 'u122030778_autopartesRost');
            define('usuario', 'u122030778_victorlop');
            define('password', 'AutoParts@rostrMaga');	
        }
 
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     } 
 }
?>