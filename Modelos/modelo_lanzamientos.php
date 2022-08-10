<?php


class modelo_Lanzamientos{
    private $conectar; //Variable para establecer la conexion a la base de datos
    private $lanzamientos;//variable para lanzamientos

    public function __construct(){//Aqui tengo el constructor del modelo
        $this->conectar = conectar :: conexion();
        $this->lanzamientos = array();
    }

    //Get 4 últimos lanzamientos
    public function get_lanzamientos(){
        // $consulta = $this->conectar->prepare("select series.nombre se, plataformas.nombre, lanzamientos.fecha from lanzamientos, series, plataformas 
        // where lanzamientos.serie = series.id and lanzamientos.plataforma = plataformas.id and series.activo = 1 and plataformas.activo = 1 
        // order by lanzamientos.fecha asc limit 0,4");
        // // $serie =0;
        // // $plataforma = 0;
        // // $fecha = 0;
        // $consulta->bind_result($serie, $plataforma, $fecha);
        // $consulta->execute();
        // $consulta->store_result();
        // echo $this->conectar->error; ///????????????Que hace esto??????
        // $i = 0;
        // while($consulta->fetch()){
        //     $this->lanzamientos[$i]["serie"] = $serie;
        //     $this->lanzamientos[$i]["plataforma"] = $plataforma;
        //     $this->lanzamientos[$i]["fecha"] = $fecha;
        //     $i++;
        // }
        // return $this->lanzamientos;
        $i = 0;
        $consulta = "select plataformas.id, plataformas.nombre, plataformas.logotipo
         from plataformas where plataformas.activo = 1";
        $resultado = $this->conectar->query($consulta);

        while($fila = $resultado->fetch_array(MYSQLI_ASSOC)){
            $consulta2 = "select series.nombre se, lanzamientos.fecha, plataformas.nombre, plataformas.logotipo, series.foto
             from lanzamientos, series, plataformas 
             where lanzamientos.serie = series.id and lanzamientos.plataforma = plataformas.id
             and series.activo = 1 and plataformas.activo = 1  
             and plataformas.id = $fila[id]
             order by lanzamientos.fecha asc limit 0,4";
            //  $this->lanzamiento[$i]["plataforma"] = $fila['nombre'];//cambiar por foto

             $resultado2 = $this->conectar->query($consulta2);
             
             while($fila2 = $resultado2->fetch_array(MYSQLI_ASSOC)){
                $this->lanzamientos[$i]["logotipo"] = $fila2['logotipo'];
                $this->lanzamientos[$i]["foto"] = $fila2['foto'];
                $this->lanzamientos[$i]["serie"] = $fila2['se'];
                $this->lanzamientos[$i]["plataforma"] = $fila2['nombre'];
                $this->lanzamientos[$i]["fecha"] = $fila2['fecha'];
             $i++;
             }
            //  return $this->lanzamientos;
        }
        return $this->lanzamientos;
        

    }

    //lanzamientos parte administrador

    public function get_lanzamientos_admin(){
        $i = 0;
        $consulta = "select plataformas.id, plataformas.nombre, plataformas.logotipo from plataformas where plataformas.activo = 1";
        $resultado = $this->conectar->query($consulta);

        while($fila = $resultado->fetch_array(MYSQLI_ASSOC)){
            $consulta2 = "select series.nombre se, lanzamientos.fecha, plataformas.nombre, lanzamientos.serie idserie, lanzamientos.plataforma idplataforma
             from lanzamientos, series, plataformas 
             where lanzamientos.serie = series.id and lanzamientos.plataforma = plataformas.id
             and series.activo = 1 and plataformas.activo = 1  
             and plataformas.id = $fila[id]
             order by lanzamientos.fecha asc";
            //  $this->lanzamiento[$i]["plataforma"] = $fila['nombre'];//cambiar por foto

             $resultado2 = $this->conectar->query($consulta2);
             
             while($fila2 = $resultado2->fetch_array(MYSQLI_ASSOC)){
                $this->lanzamientos[$i]["idserie"] = $fila2['idserie'];
                $this->lanzamientos[$i]["idplataforma"] = $fila2['idplataforma'];
                $this->lanzamientos[$i]["serie"] = $fila2['se'];
                $this->lanzamientos[$i]["plataforma"] = $fila2['nombre'];
                $this->lanzamientos[$i]["fecha"] = $fila2['fecha'];
             $i++;
             }
            //  return $this->lanzamientos;
        }
        return $this->lanzamientos;
    }

    //insertar lanzamiento

    public function modelo_insertar_lanzamientos($serie, $plataforma, $fecha){
        $consulta = $this->conectar->prepare("insert into lanzamientos (serie, plataforma, fecha) values (?, ?, ?)");
        
        $consulta->bind_param("iis", $serie, $plataforma, $fecha);
        $consulta->execute();
        $consulta->store_result();
        // $numero = $consulta->affected_rows();
        echo $consulta->error;
        echo $this->conectar->error;
    }

    //borrar lanzamiento

    public function modelo_borrar_lanzamientos($serie, $plataforma, $fecha){
        $consulta = $this->conectar->prepare("delete from lanzamientos where lanzamientos.serie = ? and lanzamientos.plataforma = ? and lanzamientos.fecha = ?");
  
        $consulta->bind_param("iis", $serie, $plataforma, $fecha);
        $consulta->execute();
        $consulta->store_result();
        echo $consulta->error;
    }

    //nos devuelve datos necesarios

    public function devolver_datos($s, $p, $f){
        $this->lanzamientos[0]["s"] = $s;
        $this->lanzamientos[0]["p"] = $p;
        $this->lanzamientos[0]["f"] = $f;

        return $this->lanzamientos;
    }

    //edita lanzamientos

    public function modelo_editar_lanzamientos($serie, $plataforma, $fecha, $s, $p, $f){
            
        $consulta = $this->conectar->prepare("update lanzamientos set
        lanzamientos.serie = ?, lanzamientos.plataforma = ?, lanzamientos.fecha = ?
        where lanzamientos.serie = ? and lanzamientos.plataforma = ? and lanzamientos.fecha = ?");
        
        $consulta->bind_param("iisiis", $serie, $plataforma, $fecha, $s, $p, $f);
        $consulta->execute();
        $consulta->store_result();
    }

    





    

        







}











?>