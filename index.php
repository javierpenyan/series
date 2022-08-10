<?php
session_start();
?> 

<?php
// session_start();


// require_once("funciones/funciones.php");
require_once("modelos/modelo_lanzamientos.php");
require_once("modelos/modelo_comentarios.php");
require_once "Bd/bd.php";
// $parametro1 = "./controladores/";
// $parametro2 = "./controladores/";
// echo insertar_menu($parametro1, $parametro2);
$comentarios = (new modelo_Comentarios())->get_comentarios();
$lanzamientos = (new modelo_lanzamientos())->get_lanzamientos();
require_once "./funciones/funciones.php";

require_once "vistas/vista_4_lanzamientos.php";
// require_once "vistas/vista_comentarios.php";

?>