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
        if(isset($_GET['modificar'])){
                // $nombre = $_POST['nombre'];
                // $descripcion = $_POST['descripcion'];
                // $activa = $_POST['activa'];
            
                // $n = $_FILES['foto']['name'];
                // $tipo = $_FILES['foto']['type'];
                // $temp = $_FILES['foto']['tmp_name'];
                // $error = $_FILES['foto']['error'];
                // $ruta = "../imagenes";
        
                // $series = $modelo_series->modelo_serie_modificar($nombre, $descripcion, $activa, $n, $tipo, $temp, $ruta, $error);
    
                $socios = $modelo_socios->getSocioById($_GET['modificar']);
                require_once "../Vistas/vista_socios_modificar.php";
            
            
        }elseif(isset($_POST['buscar'])){
            $id = $_POST['buscar'];
            $nombre = $_POST['nombre'];
            $socios = $modelo_socios->modelo_buscar_socios($nombre);
            // require_once "../Vistas/vista_series_administrador.php";
            // Header('refresh:1;url=./controlador_series.php');//??????????no va
            require_once "../Vistas/vista_socios.php";
    
        }else{
            $socios = $modelo_socios->get_socios_administrador();
            require_once "../Vistas/vista_socios.php";
        }
    }

 
}else{
    require_once "../Vistas/vistaerror.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=../index.php">';
}

        

//realizamos la insercion

if(isset($_POST['enviar'])){

    $nombre = $_POST['nombre'];
    $nick = $_POST['nick'];
    $pass = $_POST["pass"];
    // $activo = $_POST["activo"];




    $socios = $modelo_socios->modelo_insertar_socio($nombre, $nick, $activo, $pass);
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_socios.php">';
    // require_once "../Vistas/vista_series_administrador.php";
}

//inactivamos socio

if(isset($_SESSION['nick'])){
    if($_SESSION['nick'] == 'admin'){
        if(isset($_GET['inactivar_id'])){
            $id = $_GET['inactivar_id'];
            $activo = $_GET['actividad'];
            $socios = $modelo_socios->modelo_inactivar_socio($id, $activo);
            echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_socios.php">';
            // require_once "../Vistas/vista_series_administrador.php";

        }
    }
}




?>