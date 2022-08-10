<?php
class modelo_Comentarios{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $comentarios;//variable para comentarios

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->comentarios = array();
    }

    //Get 5 últimos comentarios
    public function get_comentarios(){
        $consulta = $this->conectar->prepare("select socios.nick, series.foto, comentario.texto, comentario.fecha
        from socios, comentario, series
        where comentario.serie = series.id and comentario.socio = socios.id 
        order by comentario.fecha desc limit 0,4");
        $consulta->bind_result($nick, $foto, $texto, $fecha);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; 
        $i = 0;
        while($consulta->fetch()){
            $this->comentarios[$i]["nick"] = $nick;
            $this->comentarios[$i]["foto"] = $foto;
            $this->comentarios[$i]["texto"] = $texto;
            $this->comentarios[$i]["fecha"] = $fecha;
            $i++;
        }
        return $this->comentarios;

    }

//comentarios para administrador
    public function get_comentarios_admin(){
        $consulta = $this->conectar->prepare("select socios.nick, series.nombre, comentario.fecha, comentario.texto, socios.id idso, series.id idse
        from comentario, series, socios
        where comentario.serie = series.id and comentario.socio = socios.id order by comentario.fecha asc");
        $consulta->bind_result($nick, $nombre, $fecha, $texto, $idso, $idse);
        $consulta->execute();
        $consulta->store_result();
        echo $this->conectar->error; 
        $i = 0;
        while($consulta->fetch()){
            $this->comentarios[$i]["nick"] = $nick;
            $this->comentarios[$i]["nombre"] = $nombre;
            $this->comentarios[$i]["texto"] = $texto;
            $this->comentarios[$i]["fecha"] = $fecha;
            $this->comentarios[$i]["idso"] = $idso;
            $this->comentarios[$i]["idse"] = $idse;

            $i++;
        }
        return $this->comentarios;

    }

    //borrar comentarios

    public function borrar_comentario($serie, $socio){
    
        $consulta = $this->conectar->prepare("delete from comentario 
        where comentario.socio = ? and comentario.serie = ?");
        $consulta->bind_param("ii", $socio, $serie);
        $consulta->execute();
    }






    

        







}











?>