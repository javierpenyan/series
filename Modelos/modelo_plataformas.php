<?php
require_once "../Bd/bd.php";
class modelo_Plataformas{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $plataformas;//variable para comentarios

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->plataformas = array();
    }

    //Get de todas las plataformas
    public function get_plataformas(){
        $consulta = $this->conectar->prepare("select plataformas.id, plataformas.nombre, plataformas.logotipo 
        from plataformas
         where plataformas.activo = 1");
        $consulta->bind_result($id, $nombre, $logotipo);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        while($consulta->fetch()){
            $this->plataformas[$i]["id"] = $id;
            $this->plataformas[$i]["nombre"] = $nombre;
            $this->plataformas[$i]["logotipo"] = $logotipo;
            $i++;
        }
        return $this->plataformas;

    }

//entrega todas las series correspondientes a una plataforma
    public function get_series_de_plataforma($id){///????FECHA LANZAMIENTO????/////// es la de la plataforma?
        $consulta = $this->conectar->prepare("select series.foto, series.nombre, series.descripcion, lanzamientos.fecha 
        from series, plataformas, lanzamientos 
        where lanzamientos.serie = series.id and lanzamientos.plataforma = plataformas.id
        and series.activo = 1 and plataformas.activo = 1 and plataformas.id = ?");
        $consulta->bind_param("i", $id); //aqui entra el id de la serie que he selecionado para ver mas
        $consulta->bind_result($foto, $nombre, $descripcion, $fecha);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i = 0;
        while($consulta->fetch()){
            $this->plataformas[$i]["foto"] = $foto;
            $this->plataformas[$i]["nombre"] = $nombre;
            $this->plataformas[$i]["descripcion"] = $descripcion;
            $this->plataformas[$i]["fecha"] = $fecha;

            $i++;
        }
        $consulta->close();
        return $this->plataformas;
    }

    //plataformas administrador

    public function get_plataformas_administrador(){
        $consulta = $this->conectar->prepare("select plataformas.*
        from plataformas");
        $consulta->bind_result($id, $nombre, $activo, $foto);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i=0;
        while($consulta->fetch()){
            $this->plataformas[$i]["foto"] = $foto;
            $this->plataformas[$i]["nombre"] = $nombre;
            $this->plataformas[$i]["activo"] = $activo;
            $this->plataformas[$i]["id"] = $id;
            $i++;
        }
        $consulta->close();
        return $this->plataformas;
    }

    //obtengo id necesario

    private function obtener_id(){
        $sentencia = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'series' AND   TABLE_NAME = 'plataformas';";
        
        $consulta=$this->conectar->query($sentencia);
        $fila=$consulta->fetch_array(MYSQLI_ASSOC);
        
        return $fila["AUTO_INCREMENT"];
    }


    public function modelo_editar_plataforma($nombre, $n, $tipo, $temp, $ruta, $error, $id){

        if($error == 0){

            $var = $ruta;

            if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "png")!==false || strrpos($tipo, "jpg")!==false){
            

    
                if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "jpg")!==false){
                    $extension="jpeg";
                    $var=$var."/p_".$id.".jpg";
                }else{
                    $extension="png";
                    $var=$var."/p_".$id.".jpg";
                }
    
                move_uploaded_file($temp, $var);
            } 
            
            $consulta = $this->conectar->prepare("update plataformas set plataformas.nombre = ?, plataformas.logotipo = ? where plataformas.id = ? ");
            
            $consulta->bind_param("ssi", $nombre, $var, $id);
            $consulta->execute();
            $consulta->store_result();
            // $numero = $consulta->affected_rows();
            echo $consulta->error;
            echo $this->conectar->error;
            if(!file_exists($ruta)){
                mkdir($ruta);
            }

        }else{

            $consulta = $this->conectar->prepare("update plataformas set plataformas.nombre = ? where plataformas.id = ?");
           
            $consulta->bind_param("si", $nombre, $id);
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


    public function getPlataformaById($id) {
        $consulta = $this->conectar->prepare("select plataformas.nombre, plataformas.logotipo, plataformas.id  
        from plataformas
        where plataformas.id = ?");
        $consulta->bind_param("i", $id);
        $consulta->bind_result($nombre, $foto, $id2);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i = 0;
        $consulta->fetch();
        $this->plataformas["nombre"] = $nombre;
        $this->plataformas["foto"] = $foto;
        $this->plataformas["id2"] = $id2;
        $consulta->close();
        return $this->plataformas;
    }

    //inserto plataforma

    public function modelo_insertar_plataforma($nombre, $activa, $n, $tipo, $temp, $ruta){


        $var = $ruta;

        if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "png")!==false || strrpos($tipo, "jpg")!==false){
            
            $siguiente_id = $this->obtener_id();

            if(strrpos($tipo, "jpeg")!==false || strrpos($tipo, "jpg")!==false){
                $extension="jpeg";
                $var=$var."/p_".$siguiente_id.".jpg";
            }else{
                $extension="png";
                $var=$var."/p_".$siguiente_id.".png";
            }

            move_uploaded_file($temp, $var);
        } 
        
        $consulta = $this->conectar->prepare("insert into plataformas (nombre, activo, logotipo) values (?, 1, ?)");
        
        $consulta->bind_param("ss", $nombre, $var);
        $consulta->execute();
        $consulta->store_result();
        // $numero = $consulta->affected_rows();
        echo $consulta->error;
        echo $this->conectar->error;
        if(!file_exists($ruta)){
            mkdir($ruta);
        }

          
    
    }

    //busco plataforma

    public function modelo_buscar_plataformas($nombre){
        $parametro = "%".$nombre."%";
        

        $consulta = $this->conectar->prepare("select plataformas.nombre, plataformas.logotipo, plataformas.activo, plataformas.id
        from plataformas
        where plataformas.nombre like ?");

       
        $consulta->bind_param("s", $parametro);
        $consulta->bind_result($nombre, $logotipo, $activo, $id);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; ///????????????Que hace esto??????
        $i = 0;
        $array = array();
        while($consulta->fetch()){
            $this->plataformas[$i]["nombre"] = $nombre;
            $this->plataformas[$i]["foto"] = $logotipo;
            $this->plataformas[$i]["activo"] = $activo;
            $this->plataformas[$i]["id"] = $id;
            $i++;
            

        }
        
        $consulta->close();
 
        return $this->plataformas;
    }



    // public function modelo_buscar_plataformas($nombre){
    //     $parametro = "%".$nombre."%";
    //   

    //     $consulta = $this->conectar->prepare("select plataformas.nombre, plataformas.logotipo, plataformas.activo, plataformas.id
    //     from plataformas
    //     where plataformas.nombre like ?");

    //     
    //     $consulta->bind_param("s", $parametro);
    //     $consulta->bind_result($nombre, $logotipo, $activo, $id);
    //     $consulta->execute();
    //     $consulta->store_result();
    //     echo $this->conectar->error; ///????????????Que hace esto??????
    //     $i = 0;
    //     $array = array();
    //     while($consulta->fetch()){
    //         $array[$i]["nombre"] = $nombre;
    //         $array[$i]["foto"] = $logotipo;
    //         $array[$i]["activo"] = $activo;
    //         $array[$i]["id"] = $id;
    //         $i++;
    //      

    //     }
        
    //     $consulta->close();
 
    //     return $array;
    // }


    public function get_plataformas_lanzamientos(){
        $consulta = $this->conectar->prepare("select plataformas.*
        from plataformas
        where plataformas.activo = 1");
        $consulta->bind_result($id, $nombre, $activo, $foto);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error;
        $i=0;
        while($consulta->fetch()){
            $this->plataformas[$i]["foto"] = $foto;
            $this->plataformas[$i]["nombre"] = $nombre;
            $this->plataformas[$i]["activo"] = $activo;
            $this->plataformas[$i]["id"] = $id;
            $i++;
        }
        $consulta->close();
        return $this->plataformas;
    }



}



?>