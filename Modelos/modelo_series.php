<?php
// session_start();
require_once "../Bd/bd.php";
class modelo_Series{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $series;//variable para series

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->series = array();
    }

    //Get para mostrar las series
    public function get_series(){
        $consulta = $this->conectar->prepare("select series.nombre, series.foto, series.id, plataformas.nombre nomplat, plataformas.logotipo
        from series, plataformas, lanzamientos 
        where lanzamientos.plataforma = plataformas.id and lanzamientos.serie = series.id 
        and plataformas.activo = 1 and series.activo = 1 order by lanzamientos.plataforma"); //porque es order by y no group by????????
        $consulta->bind_result($nombre, $foto, $id, $nombrep, $fotop);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        while($consulta->fetch()){
            $this->series[$i]["nombre"] = $nombre;
            $this->series[$i]["foto"] = $foto;
            $this->series[$i]["id"] = $id;
            $this->series[$i]["nombrep"] = $nombrep;
            $this->series[$i]["fotop"] = $fotop;
            $i++;
        }
        $consulta->close();
        return $this->series;
    }

    public function get_series_administrador(){
        $consulta = $this->conectar->prepare("select series.nombre, series.foto, series.id, series.activo, series.descripcion 
        from series"); //porque es order by y no group by????????
        $consulta->bind_result($nombre, $foto, $id, $activo, $descripcion);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        while($consulta->fetch()){
            $this->series[$i]["nombre"] = $nombre;
            $this->series[$i]["foto"] = $foto;
            $this->series[$i]["id"] = $id;
            $this->series[$i]["activo"] = $activo;
            $this->series[$i]["descripcion"] = $descripcion;
            $i++;
        }
        $consulta->close();
        return $this->series;
    }

    public function get_comentarios($s1){
        $consulta = $this->conectar->prepare("select series.nombre, socios.nick, comentario.texto, comentario.fecha
        from comentario, series, socios
        where socios.id = comentario.socio and series.id = comentario.serie
        and series.id = ?");
         $consulta->bind_param('i', $s1);
        $consulta->bind_result($serie, $socio, $texto, $fecha);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i = 0;
        $this->series = [];
        while($consulta->fetch()){
            $this->series[$i]["serie"] = $serie;
            $this->series[$i]["socio"] = $socio;
            $this->series[$i]["texto"] = $texto;
            $this->series[$i]["fecha"] = $fecha;
            $i++;
        }
        return $this->series;
    }

    //insertar comentario

    public function modelo_insertar_comentario($texto, $serie){//////////////////////////////////////////////////////////////////////

        $fecha = date("Y-m-d");

        $nick = $_SESSION['nick'];


        $consulta = $this->conectar->prepare('select socios.id from socios where socios.nick = ?');

            $consulta->bind_param('s',$nick);
            $consulta->execute();
            $res = $consulta->get_result()->fetch_assoc();

        




        $consulta = $this->conectar->prepare("insert into comentario values (?, ?, ?, ?)");
        
        $consulta->bind_param("iiss", $res['id'], $serie, $fecha, $texto);
        $consulta->execute();
        $consulta->store_result();
        // $numero = $consulta->affected_rows();
        echo $consulta->error;
        echo $this->conectar->error;
    }   

    //Get de la descripcion de las series cuando pulsamos ver mas

    public function get_descripcion($s1){
        $consulta = $this->conectar->prepare("select series.nombre, series.descripcion, series.foto 
        from series 
        where series.id = ?");
        $consulta->bind_param("i", $s1); //aqui entra el id de la serie que he selecionado para ver mas
        $consulta->bind_result($nombres, $descripcion, $foto);
        $consulta->execute();
        $consulta->store_result();
        echo $consulta->error;
        echo $this->conectar->error;
        // $i = 0;
        $consulta->fetch();
        $this->series["nombres"] = $nombres;
        $this->series["descripcion"] = $descripcion;
        $this->series["foto"] = $foto;
        $consulta->close();
        // $i++;
        
        return $this->series;
    }

    public function plataformas_serie($s1){
        $consulta = $this->conectar->prepare("select plataformas.id, plataformas.nombre, plataformas.logotipo, lanzamientos.fecha 
        from plataformas, lanzamientos
         where plataformas.id = lanzamientos.plataforma
         and lanzamientos.serie = ?");
         $consulta->bind_param('i', $s1);
        $consulta->bind_result($plataid, $platan, $plataf, $platafe);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i = 0;
        while($consulta->fetch()){
            $this->series[$i]["plataid"] = $plataid;
            $this->series[$i]["platan"] = $platan;
            $this->series[$i]["plataf"] = $plataf;
            $this->series[$i]["platafe"] = $platafe;
            $this->series[$i]["iduso"] = $s1;
            $i++;
        }
        return $this->series;

    }

    //obtengo id necesario

    private function obtener_id(){
        $sentencia = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'series' AND   TABLE_NAME = 'series';";
        
        $consulta=$this->conectar->query($sentencia);
        $fila=$consulta->fetch_array(MYSQLI_ASSOC);
       
        return $fila["AUTO_INCREMENT"];
    }

    //edito serie

    public function modelo_editar_serie($nombre, $descripcion, $n, $tipo, $temp, $ruta, $error, $id){

        if($error == 0){

            $var = $ruta;

            if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "png")!==false || strrpos($tipo, "jpg")!==false){
            
                $siguiente_id = $this->obtener_id();
    
                if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "jpg")!==false){
                    $extension="jpeg";
                    $var=$var."/".$nombre."_".$siguiente_id.".jpg";
                }else{
                    $extension="png";
                    $var=$var."/".$nombre."_".$siguiente_id.".png";
                }
    
                move_uploaded_file($temp, $var);
            } 
            
            $consulta = $this->conectar->prepare("update series set series.nombre = ?, series.descripcion = ?, series.foto = ? where series.id = ? ");
            
            $consulta->bind_param("sssi", $nombre, $descripcion, $var, $id);
            $consulta->execute();
            $consulta->store_result();
            // $numero = $consulta->affected_rows();
            echo $consulta->error;
            echo $this->conectar->error;
            if(!file_exists($ruta)){
                mkdir($ruta);
            }

        }else{

            $consulta = $this->conectar->prepare("update series set series.nombre = ?, series.descripcion = ? where series.id = ?");
          
            $consulta->bind_param("ssi", $nombre, $descripcion, $id);
            $consulta->execute();
            $consulta->store_result();
            // $numero = $consulta->affected_rows();
            echo $consulta->error;
            echo $this->conectar->error;
            if(!file_exists($ruta)){
                mkdir($ruta);
            }

        }
    
    }

    //inserto serie

    public function modelo_insertar_serie($nombre, $descripcion, $n, $tipo, $temp, $ruta){


        $var = $ruta;

        if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "png")!==false || strrpos($tipo, "jpg")!==false){
            
            $siguiente_id = $this->obtener_id();

            if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "jpg")!==false){
                $extension="jpeg";
                $var=$var."/".$nombre."_".$siguiente_id.".jpg";
            }else{
                $extension="png";
                $var=$var."/".$nombre."_".$siguiente_id.".png";
            }

            move_uploaded_file($temp, $var);
        } 
        
        $consulta = $this->conectar->prepare("insert into series (nombre, descripcion, activo, foto) values (?, ?, 1, ?)");
      
        $consulta->bind_param("sss", $nombre, $descripcion, $var);
        $consulta->execute();
        $consulta->store_result();
        // $numero = $consulta->affected_rows();
        echo $consulta->error;
        echo $this->conectar->error;
        if(!file_exists($ruta)){
            mkdir($ruta);
        }

          
    
    }


    
    // public function modelo_editar_serie($id, $nombre, $descripcion, $activa, $n, $tipo, $temp, $ruta){
    //     $error = 0;
    //     if($nombre == ""){
    //         $error = 1;
    //     }elseif($descripcion == ""){
    //         $error = 2;
    //     }

        

    // }

    //inactivar serie

        public function modelo_inactivar_serie($id, $activo){
            if($activo == 1){
                $consulta = $this->conectar->prepare("update series set series.activo = 0 where series.id = ?");
                $consulta->bind_param("i", $id);
                $consulta->execute();
            }else{
                $consulta = $this->conectar->prepare("update series set series.activo = 1 where series.id = ?");
                $consulta->bind_param("i", $id);
                $consulta->execute();
            }

        }

        // public function modelo_serie_modificar($nombre, $descripcion, $activa, $n, $tipo, $temp, $ruta, $error){

        //     // if($error == 1){
        //         echo"tocaria modificar en bd";
        //     // }

        // }

        public function getSerieById($id) {
            $consulta = $this->conectar->prepare("select series.nombre, series.foto, series.descripcion, series.id  
            from series
            where series.id = ?");
            $consulta->bind_param("i", $id);
            $consulta->bind_result($nombre, $foto, $descripcion, $id2);
            $consulta->execute();
            $consulta->store_result();
            echo $this->conectar->error;
            $i = 0;
            $consulta->fetch();
            $this->series["nombre"] = $nombre;
            $this->series["descripcion"] = $descripcion;
            $this->series["foto"] = $foto;
            $this->series["id2"] = $id2;
            $consulta->close();
            return $this->series;
        }

        //buscar serie

        public function modelo_buscar_series($nombre){
            $parametro = "%".$nombre."%";
            $consulta = $this->conectar->prepare("select series.nombre, series.foto, series.descripcion, series.activo, series.id
            from series
            where series.nombre like ?");
            $consulta->bind_param("s", $parametro);
            $consulta->bind_result($nombre, $logotipo, $descripcion, $activo, $id);
            $consulta->execute();
            $consulta->store_result();
            echo $this->conectar->error; ///????????????Que hace esto??????
            $i = 0;
            while($consulta->fetch()){
                $this->series[$i]["nombre"] = $nombre;
                $this->series[$i]["foto"] = $logotipo;
                $this->series[$i]["descripcion"] = $descripcion;
                $this->series[$i]["activo"] = $activo;
                $this->series[$i]["id"] = $id;
                $i++;
            }
            $consulta->close();
            return $this->series;
        }


        public function get_series_lanzamientos(){
                $consulta = $this->conectar->prepare("select series.nombre, series.foto, series.id, series.activo, series.descripcion 
        from series
        where series.activo = 1 "); //porque es order by y no group by????????
        $consulta->bind_result($nombre, $foto, $id, $activo, $descripcion);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        while($consulta->fetch()){
            $this->series[$i]["nombre"] = $nombre;
            $this->series[$i]["foto"] = $foto;
            $this->series[$i]["id"] = $id;
            $this->series[$i]["activo"] = $activo;
            $this->series[$i]["descripcion"] = $descripcion;
            $i++;
        }
        $consulta->close();
        return $this->series;
            

    }


}


        
        






    








    

        



















?>