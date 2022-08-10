<?php
session_start();
require_once "../modelos/modelo_comentarios.php";
require_once "../BD/bd.php";

$modelo_comentarios = new modelo_comentarios();

//mantenemos la sesion si estuviese guardada

if(isset($_COOKIE['mantener'])){
    session_decode($_COOKIE['mantener']);
}

//si se entra como admin, socio o usuario normal
//llamada a las funciones de los diferentes modelos

if(isset($_SESSION['nick'])){
    if($_SESSION['nick'] == 'admin'){

        if(isset($_GET['s1'])){
            $s1 = $_GET['s1'];
            $series = $modelo_series->get_descripcion($s1);
            require_once "../vistas/vista_serie_completa.php";
        }else{
            
        
                    if(isset($_GET['serie'])){
                        $serie = $_GET['serie'];
                        $socio = $_GET['socio'];
        
                        $comentarios = $modelo_comentarios->borrar_comentario($serie, $socio);
                        echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_comentarios_admin.php">';
                    }else{
                        require_once "../Vistas/vistaerror.php";
                        echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
                    }
                }
    }
}else{
    require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
}


 







?>