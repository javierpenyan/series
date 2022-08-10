<?php
    class conectar{
        //realizamos la conexion
        public static function conexion(){
            $conexion=new mysqli("localhost","root","","series");
            $conexion->set_charset("utf-8");

            return $conexion;
        } 
    }
?>