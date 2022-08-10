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





        <section class="container-md">
            <div class="row gy-0 my-0">
                <div class="col-md-12 my-5">
                    <h2 class="my-3">POLÍTICA DE COOKIES:</h2>
                    <h4>RECOGIDA DE INFORMACIÓN</h4>
                    <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias sed animi sunt quos maiores adipisci quis quas, necessitatibus minima a sint magni alias reiciendis eaque. Est culpa porro illo molestiae quaerat praesentium quibusdam aliquid harum. Necessitatibus laudantium, officiis nostrum vel cum illo doloremque labore velit tenetur animi impedit assumenda est suscipit consequatur distinctio odio corrupti non veniam beatae libero? Accusantium natus, architecto temporibus tempora totam consectetur aliquam sed velit consequuntur non, officia animi, doloremque aperiam in perspiciatis impedit optio nostrum corrupti. Nesciunt aspernatur soluta autem error. Aut suscipit cum, deserunt autem omnis quia perferendis error sunt recusandae, dolore delectus veniam aperiam eaque accusantium voluptates qui, quisquam consequatur mollitia reiciendis? Obcaecati sint alias architecto, amet culpa ratione totam ipsa cupiditate fuga molestias, adipisci distinctio odio eum necessitatibus. Rem aliquam sint assumenda commodi laborum ipsa cupiditate inventore. Incidunt inventore soluta, minus a pariatur odit sequi harum iure, fugiat expedita temporibus, atque enim animi aut dolores natus aspernatur quo quisquam perferendis earum aliquid rerum sunt alias! Dolorem at, ex eligendi voluptatem minima obcaecati veniam veritatis ipsa debitis quidem eum. Maxime sapiente harum consectetur consequatur nobis, voluptatem mollitia repellendus, quae dolorum nulla, eum vitae ipsa tempore placeat corporis fugit et reiciendis similique quibusdam eius.</P>
                    <h4 class="my-3">PARA QUE SE USAN TUS COOKIES</h4>
                    <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias sed animi sunt quos maiores adipisci quis quas, necessitatibus minima a sint magni alias reiciendis eaque. Est culpa porro illo molestiae quaerat praesentium quibusdam aliquid harum. Necessitatibus laudantium, officiis nostrum vel cum illo doloremque labore velit tenetur animi impedit assumenda est suscipit consequatur distinctio odio corrupti non veniam beatae libero? Accusantium natus, architecto temporibus tempora totam consectetur aliquam sed velit consequuntur non, officia animi, doloremque aperiam in perspiciatis impedit optio nostrum corrupti. Nesciunt aspernatur soluta autem error. Aut suscipit cum, deserunt autem omnis quia perferendis error sunt recusandae, dolore delectus veniam aperiam eaque accusantium voluptates qui, quisquam consequatur mollitia reiciendis? Obcaecati sint alias architecto, amet culpa ratione totam ipsa cupiditate fuga molestias, adipisci distinctio odio eum necessitatibus. Rem aliquam sint assumenda commodi laborum ipsa cupiditate inventore. Incidunt inventore soluta, minus a pariatur odit sequi harum iure, fugiat expedita temporibus, atque enim animi aut dolores natus aspernatur quo quisquam perferendis earum aliquid rerum sunt alias! Dolorem at, ex eligendi voluptatem minima obcaecati veniam veritatis ipsa debitis quidem eum. Maxime sapiente harum consectetur consequatur nobis, voluptatem mollitia repellendus, quae dolorum nulla, eum vitae ipsa tempore placeat corporis fugit et reiciendis similique quibusdam eius.</P>
                    <h4 class="my-3">ACCESO A CUENTA Y PERFILES</h4>
                    <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias sed animi sunt quos maiores adipisci quis quas, necessitatibus minima a sint magni alias reiciendis eaque. Est culpa porro illo molestiae quaerat praesentium quibusdam aliquid harum. Necessitatibus laudantium, officiis nostrum vel cum illo doloremque labore velit tenetur animi impedit assumenda est suscipit consequatur distinctio odio corrupti non veniam beatae libero? Accusantium natus, architecto temporibus tempora totam consectetur aliquam sed velit consequuntur non, officia animi, doloremque aperiam in perspiciatis impedit optio nostrum corrupti. Nesciunt aspernatur soluta autem error. Aut suscipit cum, deserunt autem omnis quia perferendis error sunt recusandae, dolore delectus veniam aperiam eaque accusantium voluptates qui, quisquam consequatur mollitia reiciendis? Obcaecati sint alias architecto, amet culpa ratione totam ipsa cupiditate fuga molestias, adipisci distinctio odio eum necessitatibus. Rem aliquam sint assumenda commodi laborum ipsa cupiditate inventore. Incidunt inventore soluta, minus a pariatur odit sequi harum iure, fugiat expedita temporibus, atque enim animi aut dolores natus aspernatur quo quisquam perferendis earum aliquid rerum sunt alias! Dolorem at, ex eligendi voluptatem minima obcaecati veniam veritatis ipsa debitis quidem eum. Maxime sapiente harum consectetur consequatur nobis, voluptatem mollitia repellendus, quae dolorum nulla, eum vitae ipsa tempore placeat corporis fugit et reiciendis similique quibusdam eius.</P>
                </div>
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