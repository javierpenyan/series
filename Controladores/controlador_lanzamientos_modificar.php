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

if(isset($_SESSION)){
    

    if(isset($_GET['s'])){
        $s = $_GET['s'];
        $p = $_GET['p'];
        $f = $_GET['f'];

        // $lanzamientos = $modelo_lanzamientos->getLanzamientosById($s, $p, $f);
        $lanzamientos = $modelo_lanzamientos->devolver_datos($s, $p, $f);
        $series = $modelo_series->get_series_lanzamientos();
        $plataformas = $modelo_plataformas->get_plataformas_lanzamientos();
        require_once "../Vistas/vista_lanzamientos_modificar.php";
    }

    elseif($_SESSION['nick'] == 'admin'){
        if(isset($_POST['modificar'])){
            $serie = $_POST['serie'];
            $plataforma = $_POST['plataforma'];
            $fecha = $_POST['fecha'];
            $s = $_POST['s'];
            $p = $_POST['p'];
            $f = $_POST['f'];
            
            // $plataformas = $modelo_plataformas->get_plataformas_lanzamientos();

            $lanzamientos = $modelo_lanzamientos->modelo_editar_lanzamientos($serie, $plataforma, $fecha, $s, $p, $f);
            echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_lanzamientos.php">';
            
        }
    }else{
        require_once "../Vistas/vistaerror.php";
        echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
    }
}else{
    require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
}

?>