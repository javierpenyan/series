<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos/style.css">
    <title>Document</title>
</head>
<body>

<?php
    require_once "../funciones/funciones.php";
    $parametro1 = '../';
    $parametro2 = "../controladores/";
    echo insertar_menu($parametro1, $parametro2);


?>
      <main>
          <section class="container-md">
              <div class="row gy-0 my-0">
                  <div class="col-md-12">
                    <img src="../imagenes/contacto.png" class="img-fluid" alt="...">
                  </div>
              </div>
          </section>

          <section class="container-md my-5">
              <div class="row align-items-center text-center">
                <div class="col-md-6">
                    <h2>PLATAFORMA DE SERIES</h2>
                    <h3>Disponemos de las plataformas más actuales</h3>
                    <h4>Últimos estrenos</h4>
                    <h4>Las series más exitosas</h4>
                    <h4>Disfruta junto a toda tu familia</h4>
                    <h4>ÚNETE A NOSOTROS!!!</h4>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="../imagenes/c1.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Estrenos de Marzo</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../imagenes/c2.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block ">
                              <h5>Mejores finales</h5>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, laboriosam.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../imagenes/c3.png" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Las más esperadas</h5>
                              <p>Some representative placeholder content for the third slide.</p>
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
          </section>
          <section>
              <div class="container-md my-5">
                <div class="row align-items-center text-center">
                  <div class="col-md-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item text-center">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            QUIENES SOMOS
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse text-center" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            PORQUÉ EXISTIMOS
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            PLAN DE DESARROLLO
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <section class="container my-5">
            <div class="col-md-12">
              <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.557257575365!2d-3.609844685208623!3d37.18699145353164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcef3c4fe4ff%3A0xb362c7165dc2ded2!2sEscuela%20Arte%20Granada!5e0!3m2!1ses!2ses!4v1642684396630!5m2!1ses!2ses" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>

          </section>

          <?php
    

    $p1 = '';
    $p2 = '../';
    
    echo insertar_footer($p1, $p2);
    

    ?>
         
</body>
</html>