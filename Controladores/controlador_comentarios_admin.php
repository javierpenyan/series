<?php
session_start();
require_once "../modelos/modelo_comentarios.php";
require_once "../BD/bd.php";

$modelo_comentarios = new modelo_comentarios();

//cargamos sesion si estuviera guardada

if(isset($_COOKIE['mantener'])){
    session_decode($_COOKIE['mantener']);
}

//realizamo las llamadas a las funciones de los modelos

if(isset($_GET['s1'])){
    $s1 = $_GET['s1'];
    $series = $modelo_series->get_descripcion($s1);
    require_once "../vistas/vista_serie_completa.php";
}else{            
            
    $comentarios = $modelo_comentarios->get_comentarios_admin();
    require_once "../Vistas/vista_comentarios_admin.php";
}


?>