
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
<body>



<?php

require_once "../funciones/funciones.php";

if(isset($_SESSION['nick'])){
  echo "<h1>Has iniciado sesion</h1>";
}else{

  $parametro1 = '../';
  $parametro2 = "./";

  echo insertar_menu($parametro1, $parametro2);
?>
<div id='ancho'>
  <div class='container mt-3 text-center'>
    <h2>Registrarse:</h2>

    
    
    <form action='../controladores/controlador_inicio_sesion.php' method = 'post'>
    
    <div class='mb-3 mt-3'>
        <label for='nick'>Nick:</label>
        <input type='text' class='form-control' id='nick' placeholder='Introduzca nick' name='nick' required>
      </div>
      <div class='mb-3'>
        <label for='pwd'>Contraseña:</label>
        <input type='password' class='form-control' id='pwd' placeholder='introduzca contraseña' name='pass' required>
      </div>
      <div class='form-check mb-3'>
        <label class='form-check-label'>
          <input class='form-check-input' type='checkbox' name='mantener' value = 'si'>Mantener sesión
        </label>
      </div>
      <input type='submit' class='btn btn-primary' name = 'enviar'>
    </form>
  </div>

</div>
  
<?php
}
  echo "<footer class='page-footer font-small purple pt-4 ' id='colores'>
  <div class='container-fluid text-center text-md-left'>
    <div class='row'>
      <div class='col-md-6 mt-md-0 mt-3'>
        <h5 class='text-uppercase'>Footer Content</h5>
        <p>Here you can use rows and columns to organize your footer content.</p>

      </div>

      <hr class='clearfix w-100 d-md-none pb-3'>
      <div class='col-md-3 mb-md-0 mb-3'>
        <h5 class='text-uppercase'>Links</h5>

        <ul class='list-unstyled'>
          <li>
            <a href='#!'>Link 1</a>
          </li>
          <li>
            <a href='#!'>Link 2</a>
          </li>
          <li>
            <a href='#!'>Link 3</a>
          </li>
          <li>
            <a href='#!'>Link 4</a>
          </li>
        </ul>

      </div>
      <div class='col-md-3 mb-md-0 mb-3'>
        <h5 class='text-uppercase'>Links</h5>

        <ul class='list-unstyled'>
          <li>
            <a href='#!'>Link 1</a>
          </li>
          <li>
            <a href='#!'>Link 2</a>
          </li>
          <li>
            <a href='#!'>Link 3</a>
          </li>
          <li>
            <a href='#!'>Link 4</a>
          </li>
        </ul>

      </div>
    </div>
  </div>
</footer>"
?>


</body>
</html>