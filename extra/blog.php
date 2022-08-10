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
    <link href="../estilos/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- Menu -->

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

    <main>
  
        <section id=principal_blog>

            <h2>EL BLOG DEL FRIKY</h2>

        </section>
        <section id=seccionblog>
            <!-- Seccion donde introduzco los diferentes comentarios e imagenes del blog -->
            <div>
                <div id=blogtext><a href="../imagenes/bl1.png"><h3>Curiosidades en las seies de animación</h3></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error odit a eligendi nisi libero soluta impedit, est, quos quae accusamus fugit ipsum, suscipit laborum minima asperiores quo velit nihil modi.</p>
                </div>
                <div id=imblog1></div>
            </div>
            <div>
                <div id=imblog2></div>
                <div id=blogtext><a href="../imagenes/bl2.png"><h3>La historia oculta del Señor Burns</h3></a>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero enim accusantium nesciunt at architecto recusandae, et, ex, dicta quia voluptatem itaque. Alias iusto quo similique saepe eligendi optio ab repudiandae.</p>
                </div>
            </div>
            <div>
                <div id="blogtext"><a href="../imagenes/bl3.png"><h3>Los villanos mas odiados de todas las series</h3></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab sapiente, obcaecati deleniti sit odit consequuntur suscipit nam accusantium natus repellat maxime unde atque inventore placeat! Nulla adipisci reiciendis vel rem.</p>
                </div>
                <div id=imblog3></div>
            </div>
            <div>
                <div id=imblog4></div>
                <div id=blogtext><a href="../imagenes/bl4.png"><h3>A qué personaje corresponderían ellos?</h3></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nulla, nam ea dolore consequatur deleniti nisi voluptates, quo officiis nemo architecto iusto consectetur ratione ab inventore hic repellat reiciendis et!</p>
                </div>
            </div>
            <div>
                <div id=blogtext><a href="../imagenes/bl5.png"><h3>Cómo disfrutar al máximo de una noche de cine</h3></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dignissimos mollitia magni est, quisquam distinctio ullam minus exercitationem molestiae consectetur maiores quae veniam illo accusantium quasi eveniet, iusto sunt id.</p>
                </div>
                <div id=imblog5></div>
            </div>
        </section>
    </main>

    <?php
    

    $p1 = '';
$p2 = '../';

echo insertar_footer($p1, $p2);

    

    ?>
</body>
</html>