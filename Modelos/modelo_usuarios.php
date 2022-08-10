<?php
 session_start();

require_once "../Bd/bd.php";
class modelo_socios{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $usuarios;//variable para registros

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->usuarios = array();
    }

    


    //compruebo que el usuario que se quiere registrar existe
    //e inicio sesion
    public function comprobar_inicioSesion($nick, $pass, $mantener){
        $exito_inicio = false;
        $tiempo = time() + 60*60*24;

        $consulta = $this->conectar->prepare("select * from socios
        where nick = ? and pass = ?");
        $consulta->bind_param("ss", $nick, $pass);
    //    $consulta->bind_result($n);
       $consulta->execute();
       $consulta->store_result();
       $numero_filas = $consulta->num_rows;
       echo $this->conectar->error;
       $consulta->fetch();
       $consulta->close();

        if($numero_filas>0){

            $exito_inicio = true;
           
            $_SESSION['nick'] = $nick; // objeto usuari completo
            echo "Entro por aquí!1";
            if($mantener == 'si'){
                echo "Entro por aquí!2";
                $datos = session_encode();
                var_dump($_COOKIE);
                setcookie('mantener', $datos, $tiempo, '/');

                var_dump($_COOKIE);
            }

            // if($mantener == 1){
            //     $datos = session_encode();
            //     setcookie('mantener', $datos, $tiempo, '/');
            // }
            // require_once "../vistas/vista_iniciar_sesion.php";

            // $this->usuarios['control_registro'] = $control_registro;
        }

       return $exito_inicio;
   }


}
?>