<?php
require_once "../Bd/bd.php";
class modelo_Socios{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $socios;//variable para socios

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->socios = array();
    }

    //muestra socios admin

    public function get_socios_administrador(){
        $consulta = $this->conectar->prepare("select socios.nombre, socios.nick, socios.id, socios.activo, socios.pass 
        from socios"); //porque es order by y no group by????????
        $consulta->bind_result($nombre, $nick, $id, $activo, $pass);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        while($consulta->fetch()){
            $this->socios[$i]["nombre"] = $nombre;
            $this->socios[$i]["nick"] = $nick;
            $this->socios[$i]["id"] = $id;
            $this->socios[$i]["activo"] = $activo;
            $this->socios[$i]["pass"] = $pass;
            $i++;
        }
        $consulta->close();
        return $this->socios;
    }

    //Get de la descripcion de las series cuando pulsamos ver mas

    // public function get_descripcion($s1){
    //     $consulta = $this->conectar->prepare("select series.nombre, series.descripcion, series.foto, lanzamientos.fecha, plataformas.nombre n 
    //     from series, plataformas, lanzamientos 
    //     where lanzamientos.plataforma = plataformas.id and lanzamientos.serie = series.id 
    //     and plataformas.activo = 1 and series.activo = 1 and series.id = ?");
    //     $consulta->bind_param("i", $s1); //aqui entra el id de la serie que he selecionado para ver mas
    //     $consulta->bind_result($nombres, $descripcion, $foto, $fecha, $nombrep);
    //     $consulta->execute();
    //     $consulta->store_result();
    //     echo $consulta->error;
    //     echo $this->conectar->error;
    //     // $i = 0;
    //     $consulta->fetch();
    //     $this->series["nombres"] = $nombres;
    //     $this->series["descripcion"] = $descripcion;
    //     $this->series["foto"] = $foto;
    //     $this->series['fecha'] = $fecha;
    //     $this->series['nombrep'] = $nombrep;

    //     $consulta->close();
    //     // $i++;
        
    //     return $this->series;
    // }

    //obtengo id necesario

    private function obtener_id(){
        $sentencia = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'series' AND   TABLE_NAME = 'socioss';";
        
        $consulta=$this->conectar->query($sentencia);
        $fila=$consulta->fetch_array(MYSQLI_ASSOC);
        
        return $fila["AUTO_INCREMENT"];
    }

    //inserto socio

    public function modelo_insertar_socio($nombre, $nick, $activo, $pass){

 
        
        $consulta = $this->conectar->prepare("insert into socios (nombre, nick, activo, pass) values (?, ?, 1, ?)");
        
        $consulta->bind_param("sss", $nombre, $nick, $pass);
        $consulta->execute();
        $consulta->store_result();
        // $numero = $consulta->affected_rows();
        echo $consulta->error;
        echo $this->conectar->error;
    }


    
    // public function modelo_editar_serie($id, $nombre, $descripcion, $activa, $n, $tipo, $temp, $ruta){
    //     $error = 0;
    //     if($nombre == ""){
    //         $error = 1;
    //     }elseif($descripcion == ""){
    //         $error = 2;
    //     }

        

    // }

    //inactivo socio

        public function modelo_inactivar_socio($id, $activo){
            if($activo == 1){
                $consulta = $this->conectar->prepare("update socios set socios.activo = 0 where socios.id = ?");
                $consulta->bind_param("i", $id);
                $consulta->execute();
            }else{
                $consulta = $this->conectar->prepare("update socios set socios.activo = 1 where socios.id = ?");
                $consulta->bind_param("i", $id);
                $consulta->execute();
            }

        }

        // public function modelo_serie_modificar($nombre, $descripcion, $activa, $n, $tipo, $temp, $ruta, $error){

        //     if($error == 1){
        //         $consulta = $conexion->prepare("update series set series.nombre = ?,
        //         series.descripcion = ?, series.activa = ? where series.id = ?");
        //         $consulta
        //     }

        // }

        public function getSocioById($id) {
            $consulta = $this->conectar->prepare("select socios.nombre, socios.nick, socios.id, socios.pass 
            from socios
            where socios.id = ?");
            $consulta->bind_param("i", $id);
            $consulta->bind_result($nombre, $nick, $id, $pass);
            $consulta->execute();
            $consulta->store_result();
            echo $this->conectar->error;
            $i = 0;
            $consulta->fetch();
            $this->socios["nombre"] = $nombre;
            $this->socios["nick"] = $nick;
            $this->socios["pass"] = $pass;
            $this->socios["id"] = $id;
            $consulta->close();
            return $this->socios;
        }

        //busco socio

        public function modelo_buscar_socios($nombre){
            $parametro = "%".$nombre."%";
            $consulta = $this->conectar->prepare("select socios.nombre, socios.nick, socios.activo, socios.id
            from socios
            where socios.nombre like ?");
            $consulta->bind_param("s", $parametro);
            $consulta->bind_result($nombre, $nick, $activo, $id);
            $consulta->execute();
            $consulta->store_result();
            echo $this->conectar->error; ///????????????Que hace esto??????
            $i = 0;
            while($consulta->fetch()){
                $this->socios[$i]["nombre"] = $nombre;
                $this->socios[$i]["nick"] = $nick;
                $this->socios[$i]["activo"] = $activo;
                $this->socios[$i]["id"] = $id;
                $i++;
            }
            $consulta->close();
            return $this->socios;
        }


        //edito socio

        public function modelo_editar_socio($nombre,$nick,$pass, $id){
            
            
            $consulta = $this->conectar->prepare("update socios set socios.nombre = ?, socios.nick = ?, socios.pass = ? where socios.id = ? ");
            
            $consulta->bind_param("sssi", $nombre, $nick, $pass, $id);
            $consulta->execute();
            $consulta->store_result();
            // $numero = $consulta->affected_rows();</q>

        }   

}