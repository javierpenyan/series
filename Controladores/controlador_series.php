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

if(isset($_GET['s1'])){
    $s1 = $_GET['s1'];
    $plataformaDescr = $modelo_series->plataformas_serie($s1);
    $series = $modelo_series->get_descripcion($s1);
    $comentariosSerie = $modelo_series->get_comentarios($s1);
    
    require_once "../vistas/vista_serie_completa.php";
}else{
    
        if($_SESSION['nick'] == 'admin'){
        if(isset($_GET['modificar'])){

            $serie = $modelo_series->getSerieById($_GET['modificar']);
                require_once "../Vistas/vista_series_modificar.php";
                

            
        //realizamos la busqueda llamando al modelo
            
        }elseif(isset($_POST['buscar'])){
            $id = $_POST['buscar'];
            $nombre = $_POST['nombre'];
            $series = $modelo_series->modelo_buscar_series($nombre);
            
            require_once "../Vistas/vista_sesies_administrador.php";

        }else{
            $series = $modelo_series->get_series_administrador();
            require_once "../Vistas/vista_sesies_administrador.php";
        }
    
    }else{
        $series = $modelo_series->get_series();
        require_once "../vistas/vista_series.php";
    }
    
}

//insertamos serie y llamamos al correspondiente modelo

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    // $id = $_POST['id'];
    // $activa = $_POST['activa'];

    $n = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $temp = $_FILES['foto']['tmp_name'];
    $ruta = "../imagenes";
    $activa = 1;

    $series = $modelo_series->modelo_insertar_serie($nombre, $descripcion, $n, $tipo, $temp, $ruta);
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_series.php">';
    // require_once "../Vistas/vista_series_administrador.php";
}

//inactivamos la serie

if(isset($_SESSION['nick'])){
    if($_SESSION['nick'] == 'admin'){
        if(isset($_GET['inactivar_id'])){
            $id = $_GET['inactivar_id'];
            $activo = $_GET['actividad'];
            $series = $modelo_series->modelo_inactivar_serie($id, $activo);
            echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_series.php">';


        }
    }
}

//insertamos comentario

if(isset($_POST['comentar'])){
    $texto = $_POST['texto'];
    $nick = $_SESSION['nick'];
    $serie = $_POST['serie'];


    $series = $modelo_series->modelo_insertar_comentario($texto, $serie);
    // echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_series.php">';
}

// if(isset($_SESSION['nick'])){
//     if($_SESSION['nick'] == 'admin'){
//         if(isset($_GET['buscar'])){
//             $id = $_POST['buscar'];
//             $nombre = $_POST['nombre'];
//             $series = $modelo_series->modelo_buscar_series($nombre);
//             // require_once "../Vistas/vista_series_administrador.php";
//             Header('refresh:1;url=./controlador_series.php');//??????????no va

//         }
//     }
// }


// if($_SESSION['nick'] == 'admin'){
    
// }



?>