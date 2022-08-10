<?php
session_start();

require_once "../modelos/modelo_plataformas.php";
require_once "../modelos/modelo_series.php";

require_once "../BD/bd.php";

$modelo_plataformas = new modelo_plataformas();
// error_reporting(0);

//mantenemos la sesion si estuviese guardada

if(isset($_COOKIE['mantener'])){
    session_decode($_COOKIE['mantener']);
}

//si se entra como admin, socio o usuario normal
//llamada a las funciones de los diferentes modelos


    if(isset($_GET['s1'])){
        $s1 = $_GET['s1'];
        $plataformas = $modelo_plataformas->get_series_de_plataforma($s1);
        include "../vistas/vista_plataforma_completa.php";
    }else{


            if($_SESSION['nick'] == 'admin'){

            if(isset($_GET['modificar'])){
                $plataforma = $modelo_plataformas->getPlataformaById($_GET['modificar']);
                require_once "../Vistas/vista_plataformas_modificar.php";


        }elseif(isset($_POST['buscar'])){

        $id = $_POST['buscar'];
        $nombre = $_POST['nombre'];

        $plataformas = $modelo_plataformas->modelo_buscar_plataformas($nombre);

        
        require_once "../Vistas/vista_plataformas_administrador.php";

    }else{
        $plataformas = $modelo_plataformas->get_plataformas_administrador();
        require_once "../Vistas/vista_plataformas_administrador.php";
    }
    
    }else{
        $plataformas = $modelo_plataformas->get_plataformas();
        require_once "../vistas/vista_plataformas.php";
    }
}


//insertar plataformas

if(isset($_POST['enviar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    // $activa = $_POST['activa'];

    $n = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $temp = $_FILES['foto']['tmp_name'];
    $ruta = "../imagenes";
    $activa = 1;

    $series = $modelo_plataformas->modelo_insertar_plataforma($nombre, $activa, $n, $tipo, $temp, $ruta);
    // require_once "../Vistas/vista_series_administrador.php";
    echo'<META HTTP-EQUIV="REFRESH"CONTENT="1;URL=./controlador_plataformas.php">';
}




    


// if(isset($_GET['s1'])){
//     $s1 = $_GET['s1'];
//     $plataformas = $modelo_plataformas->get_series_de_plataforma($s1);
//     include "../vistas/vista_plataforma_completa.php";

// }else{
//     $plataformas = $modelo_plataformas->get_plataformas();
//     include "../vistas/vista_plataformas.php";
// }


// if($_SESSION['nick'] == 'admin'){
//     $plataformas = $modelo_plataformas->get_plataformas_administrador();
//     include "../vistas/vista_plataformas_administrador.php";
    
// }else{
//     $plataformas = $modelo_plataformas->get_plataformas();
//     include "../vistas/vista_plataformas.php";
// }


?>