
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../estilos/style.css" rel="stylesheet"></link>
    <title>Document</title>
</head>
<body id='ad'>
    <?php
    
    require_once "../funciones/funciones.php";

    $parametro1 = '../';
    $parametro2 = "./";

    $rol = comprobar_sesion();

    if($rol == 1){
        echo insertar_menu($parametro1, $parametro2);


        echo"<section class='container-md text-center my-2'>
        <div class='row gy-0 my-0'>
            <div class='col-md-12 text-center'>
              <img src='../imagenes/series.png' class='img-fluid' alt='series'>
            </div>
        </div>
        </section>'";

        echo"<section class='container my-5'>
        <div class='col-md-12'>
            <div class='row text-center' id='centrar'>
                <h2>NUESTRAS SERIES</h2>
            </div>
        </div>
        </section>";


        echo"<section class='container-md'>
                <div class='row gy-0 my-0' id='centrar'>
                    <div class='col-md-12 text-center align-self-center'>";
                    echo"<table border class='mx-auto'><tr><th>Serie</th><th>Plataforma</th><th>fecha</th><th>Modificar</th><th>Borrar</th></tr>";
                        $i=0;
                        foreach($lanzamientos as $lanzamiento){
                            $fechaa = $lanzamiento['fecha'];
                            $fechab = fecha($fechaa);
                            echo"<tr><td>".$lanzamiento['serie']."</td><td>".$lanzamiento['plataforma']."</td>
                            <td>".$fechab."</td>
                            <td><a href='../controladores/controlador_lanzamientos_modificar.php?s=".$lanzamiento['idserie']."&p=".$lanzamiento['idplataforma']."&f=".$lanzamiento['fecha']."&accion=m'>Modificar</a></td> 
                            <td><a href='../controladores/controlador_lanzamientos.php?s=".$lanzamiento['idserie']."&p=".$lanzamiento['idplataforma']."&f=".$lanzamiento['fecha']."&accion=b'>Borrar</a></td>"; //aqui cambiar cosas en editar
                        }
                        echo"</table>";
                    echo"</div>
                </div>
            </section>";

        
    
        echo"
        <section class='container-md my-5'>
                <div class='row gy-0 my-0' id='centrar'>
                    <div class='col-md-12 text-center align-self-center'>
        <h2>Introducir Lanzamiento</h2>
         <form action = '../controladores/controlador_lanzamientos.php' method = 'post' enctype = 'multipart/form-data'>
         <select class='form-select' aria-label='Default select example' name='serie'>";
         foreach($series as $serie){
            echo"<option value='$serie[id]'>$serie[nombre]</option>";
         }
        echo"</select>
        <select class='form-select' aria-label='Default select example' name='plataforma'>";
         foreach($plataformas as $plataforma){
            echo"<option value='$plataforma[id]'>$plataforma[nombre]</option>";
         }
        echo"</select>
        <input type='date' id='start' name='fecha'>
         <button type='submit' class='btn btn-primary' name = 'enviar'>Enviar</button>
         </form>
         </div>
         </div>
     </div>
</section>";
    
$p1 = '../extra/';
$p2 = '../';

echo insertar_footer($p1, $p2);
    
        
    


    }else{
        //llamar a vista error no tienes permiso para acceder aqui
    }

    ?>
</body>
</html>