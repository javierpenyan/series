<?php
session_start();


//cerramos sesion y borramos la cookie
$_SESSION = array();
if(isset($_COOKIE['mantener'])){
    setcookie('mantener', null, -5, '/');
    session_destroy();
}


Header('refresh:1;url=../index.php');//cuando este el index 


?>