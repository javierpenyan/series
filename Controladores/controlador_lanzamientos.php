<?php
session_start();
//llamamos al modelo necesario
require_once "../modelos/modelo_lanzamientos.php";
require_once "../modelos/modelo_series.php";
require_once "../modelos/modelo_plataformas.php";
require_once "../BD/bd.php";

$modelo_lanzamientos = new modelo_Lanzamientos();
$modelo_series = new modelo_series();
$modelo_plataformas = new modelo_plataformas();

//mantenemos la sesion si estuviese guardada

if(isset($_COOKIE['mantener'])){
    session_decode($_COOKIE['mantener']);
}

//si se entra como admin, socio o usuario normal
//llamada a las funciones de los diferentes modelos

if(isset($_SESSION['nick'])){
    if($_SESSION['nick'] == 'admin'){
        $lanzamientos = $modelo_lanzamientos->get_lanzamientos_admin();

        $series = $modelo_series->get_series_lanzamientos();
        $plataformas = $modelo_plataformas->get_plataformas_lanzamientos();
        require_once "../Vistas/vista_lanzamientos_administrador.php";
    }else{
        require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
    }
}else{

    $lanzamientos = $modelo_lanzamientos->get_lanzamientos();

    require_once "../Vistas/vista_4_lanzamientos.php";

}

//insertar lanzamientos llamada al modelo

if(isset($_POST['enviar'])){
    $serie = $_POST['serie'];
    $plataforma = $_POST['plataforma'];
    $fecha = $_POST['fecha'];
    $lanzamientos = $modelo_lanzamientos->modelo_insertar_lanzamientos($serie, $plataforma, $fecha);
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_lanzamientos.php">';
}

//llamada al modelo borrar lanzamiento

if(isset($_GET['accion'])){
    if($_GET['accion'] == 'b'){
        $serie = $_GET['s'];
        $plataforma = $_GET['p'];
        $fecha = $_GET['f'];

        $lanzamientos = $modelo_lanzamientos->modelo_borrar_lanzamientos($serie, $plataforma, $fecha);
        echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_lanzamientos.php">';
    }
}











?>