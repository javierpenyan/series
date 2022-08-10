<?php

require_once "../Modelos/modelo_usuarios.php";
require_once "../BD/bd.php";


$modelo_usuarios = new modelo_socios();

//controlamos el inicio de sesion

if(isset($_POST['enviar'])){
    $mantener = 0;
    $nick = $_POST['nick'];
    $pass = $_POST['pass'];
    if(isset($_POST['mantener'])){
        $mantener = $_POST['mantener'];
    }

    $registro = $modelo_usuarios->comprobar_inicioSesion($nick, $pass, $mantener);

    if($registro == 0){
        Header('refresh:1;url=../vistas/vista_iniciar_sesion.php?e=1');
    }else{
        // echo'<META HTTP-EQUIV="REFRESH"CONTENT=";URL=../index.php">';
        Header('Location: ../index.php');
    }

}

require_once "../vistas/vista_iniciar_sesion.php";



?>