
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
                <h2>MODIFICAR SOCIO</h2>
            </div>
        </div>
        </section>";
        echo"


        <div class='container-md'>
        <div class='row gy-0 my-0' id='centrar'>
            <div class='col-md-12 text-center align-self-center' id='controlw'>
              <form action = '../controladores/controlador_socios_realizar_modificado.php' method = 'post' enctype = 'multipart/form-data'>
              <div class='form-floating mb-3'>
                <input type='hidden' value = '". $socios["id"] ."' class='form-control'  name='id'>
              </div>
              <div class='form-floating mb-3'>
                <input type='text' value = '". $socios["nombre"] ."' class='form-control' id='nombre' placeholder='nombre' name='nombre' required>
                <label for='Nombre'>Nombre</label>
              </div>
              <div class='form-floating mb-3'>
              <input type='text' value = '". $socios["nick"] ."' class='form-control' id='nick' placeholder='nombre' name='nick' required>
              <label for='nick'>Nick</label>
            </div>
            <div class='form-floating mb-3'>
            <input type='password' value = '". $socios["pass"] ."' class='form-control' id='pass' placeholder='nombre' name='pass' required>
            <label for='pass'>Contrase??a</label>
          </div>
              <button type='submit' class='btn btn-primary' name = 'modificar'>Enviar</button>
              </form>";

          echo"</div>
          </div>
      </div>";

      $p1 = '../extra/';
      $p2 = '../';
  
      echo insertar_footer($p1, $p2);
    }
    ?>
    </body>
    </html>