
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

        echo"<div class='container-md'>
                <div class='row gy-0 my-0' id='centrar'>
                    <div class='col-md-12 text-center align-self-center' id='controlw'>";
                    echo"<table border class='mx-auto'><tr><th>Fotografía</th><th>Serie</th><th>Descripción</th><th>Modificar</th><th>Actividad</th></tr>";
                        $i=0;
                        foreach($series as $serie){
                            echo"<tr><td><img class='w-50' src='".$serie['foto']."' alt='foto'></td><td>".$serie['nombre']."</td>
                            <td>".$serie['descripcion']."</td>
                            <td><a href='../controladores/controlador_series.php?modificar=".$serie['id']."'>Modificar</a></td>";
                            if($serie['activo'] == 1){
                                echo"<td><a href='../controladores/controlador_series.php?inactivar_id=".$serie['id']."&actividad=".$serie['activo']."'>Inactivar</a></td>
                                </tr>";
                            }else{
                                echo"<td><a href='../controladores/controlador_series.php?inactivar_id=".$serie['id']."&actividad=".$serie['activo']."'>Activar</a></td>
                                </tr>";
                            }
                            
                        }
                        echo"</table>";
                    echo"</div>
                </div>
            </div>";
    ?>
        
    <section class='container-md my-5'>
                <div class='row gy-0 my-0' id='centrar'>
                    <div class='col-md-12 text-center align-self-center'>
                        <h2>Introducir Serie</h2>
                        <form action = '../controladores/controlador_series.php' method = 'post' enctype = 'multipart/form-data'>
                        <div class='form-floating mb-3'>
                        <!-- <h4>Nombre:</h4> -->
                            <input type='text' class='form-control' id='nombre' placeholder='nombre' name='nombre' required>
                            <label for='Nombre'>Nombre</label>
                        </div>
                        <div class='form-floating'>
                        <!-- <h4>Descripcion:</h4> -->
                            <input type='text' class='form-control' id='descripcion' placeholder='descripcion' name='descripcion' required>
                            <label for='descripcion'>Descripción</label>
                            <div>
                            <!-- <h4>Fotografía:</h4> -->
                            <label for='foto' class='form-label'>Introduzca fotografía</label>
                            <input class='form-control form-control-lg' id='foto' type='file' name = 'foto' required>
                            </div>
                            <button type='submit' class='btn btn-primary' name = 'enviar'>Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
          <!-- <select class="form-select" name = 'activa' aria-label="Default select example">
        <option selected>Actividad</option>
        <option value="1">Activa</option>
        <option value="0">Inactiva</option>
        </select> -->
          <!-- <div class='form-floating'>
            <input type='text' class='form-control' id='activa' placeholder='descripcion' name='activa'>
            <label for='activa'>Actividad</label>
          </div> -->

        
    <section class='container-md my-5'>
        <div class='row gy-0 my-0' id='centrar'>
            <div class='col-md-12 text-center align-self-center'>
                <h2>Buscar Serie</h2>
                <form action = '../controladores/controlador_series.php' method = 'post' enctype = 'multipart/form-data'>
                <div class='form-floating mb-3'>
                    <input type='text' class='form-control' id='nombre' placeholder='nombre' name='nombre'>
                    <label for='Nombre'>Nombre</label>
                </div>
                <button type='submit' class='btn btn-primary' name = 'buscar'>Buscar</button>
                </form>
            </div>
        </div>
    </section>
         
    
         <?php
        
    
        $p1 = '../extra/';
        $p2 = '../';
    
        echo insertar_footer($p1, $p2);
    
        
    


    }else{
        //llamar a vista error no tienes permiso para acceder aqui
    }

    ?>
</body>
</html>