<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./estilos/style.css" rel="stylesheet">
    </link>
    <script type="text/javascript" src="js/app.js" defer></script>
    <title>Document</title>
</head>

<body id="colorAdmin">
    <?php

    require_once "./funciones/funciones.php";

    $parametro1 = './';
    $parametro2 = "./controladores/";

    // $parametro3 = ""



    // $rol = comprobar_sesion();


    echo insertar_menu($parametro1, $parametro2);


    echo "<section class='container-sm text-center my-2'>
        <div class='row gy-0 my-0 '>
            <div class='col-md-12 text-center'>
              <img src='./imagenes/series.png' class='img-fluid' alt='series'>
            </div>
        </div>
        </section>'";

    echo "<section class='container my-5'>
        <div class='row text-center' id='centrar'>
            <div class='col-md-12'>

                <h2>ÚLTIMOS LANZAMIENTOS:</h2>
            </div>
        </div>
        </section>";

    echo "<div class='container-xl'>
                <div class='row gy-0 my-0 ' id='centrar' >";


    // $i=0;
    foreach ($lanzamientos as $lanzamiento) {
        echo "<div class='col-lg-3 text-center align-self-center my-5' id='recoger'> 
                            <img id='f' src='imagenes/" . $lanzamiento['logotipo'] . "' class='img-fluid w-75' alt='plataformas'>
                            <img id='f' src='imagenes/" . $lanzamiento['foto'] . "' class='img-fluid w-75' alt='series'><br>";
        echo "</div>";
    }

    echo "</div>
                </div>
            </div>";

    if (!isset($_SESSION['nick'])) {

            echo '<div class="modal" tabindex="-1" id = "modal">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ACEPTAR COOKIES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Acepto la política de cookies.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    </div>';
        
    }





    echo "<section class='container my-5'>
    <div class='row text-center' id='centrar'>
        <div class='col-md-12'>

            <h2>ÚLTIMOS COMENTARIOS:</h2>
        </div>
    </div>
    </section>";



    echo '<section class="container-md my-5 justify-content-center">
        <div class="row align-items-center text-center justify-content-center">
            <div class="col-md-6 align-items-center text-center justify-copntent-center">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="imagenes/' . $comentarios[0]['foto'] . '" class="d-block w-100 img-fluid" alt="...">
                        <div class="carousel-caption d-none d-md-block" id="cc">
                        <div id="caja">
                        <h2>' . $comentarios[0]['nick'] . ': </h2><h5>' . $comentarios[0]['texto'] . '</h5>
                        </div>
                        </div>
                        </div>


                        <div class="carousel-item">
                        <img src="imagenes/' . $comentarios[1]['foto'] . '" class="d-block w-100 img-fluid" alt="...">
                        <div class="carousel-caption d-none d-md-block"  id="cc">
                        <div id="caja">
                        <h2>' . $comentarios[1]['nick'] . ': </h2><h5>' . $comentarios[1]['texto'] . '</h5>
                        </div>
                        </div>
                        </div>


                        <div class="carousel-item">
                        <img src="imagenes/' . $comentarios[2]['foto'] . '" class="d-block w-100 img-fluid" alt="...">
                        <div class="carousel-caption d-none d-md-block"  id="cc">
                        <div id="caja">
                        <h2>' . $comentarios[2]['nick'] . ': </h2><h5>' . $comentarios[2]['texto'] . '</h5>
                        </div>
                        </div>
                        </div>

                        <div class="carousel-item">
                        <img src="imagenes/' . $comentarios[3]['foto'] . '" class="d-block w-100 img-fluid" alt="...">
                        <div class="carousel-caption d-none d-md-block"  id="cc">
                            <div id="caja">
                            <h2>' . $comentarios[3]['nick'] . ': </h2><h5>' . $comentarios[3]['texto'] . '</h5>
                            </div>
                            
                            
                        </div>
                        </div>


                    
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
              </div>
        </section>';



    $p1 = 'extra/';
    $p2 = '';

    echo insertar_footer($p1, $p2);



    ?>
</body>

</html>