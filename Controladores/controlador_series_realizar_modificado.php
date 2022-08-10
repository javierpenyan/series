<?php
session_start();
require_once "../modelos/modelo_series.php";
require_once "../BD/bd.php";

$modelo_series = new modelo_series();

//mantenemos la sesion si estuviese guardada

if(isset($_COOKIE['mantener'])){
    session_decode($_COOKIE['mantener']);
}

//si se entra como admin, socio o usuario normal
//llamada a las funciones de los diferentes modelos

if(isset($_SESSION['nick'])){
    if($_SESSION['nick'] == 'admin'){
        if(isset($_POST['modificar'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $n = $_FILES['foto']['name'];
            $tipo =$_FILES['foto']['type'];
            $temp = $_FILES['foto']['tmp_name'];
            $ruta = $ruta = "../imagenes";
            $error = $_FILES['foto']['error'];

            $series = $modelo_series->modelo_editar_serie($nombre, $descripcion, $n, $tipo, $temp, $ruta, $error, $id);
            echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_series.php">';
        }
    }else{
        require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
    }
}else{
    require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
}