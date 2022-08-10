<?php
session_start();
require_once "../modelos/modelo_socios.php";
require_once "../BD/bd.php";

$modelo_socios = new modelo_socios();

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
            $nick = $_POST['nick'];
            $pass = $_POST['pass'];

           
            $socios = $modelo_socios->modelo_editar_socio($nombre, $nick, $pass, $id);
            echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_socios.php">';

        }else{
            require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
        }
    }
}else{
    require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
}

?>