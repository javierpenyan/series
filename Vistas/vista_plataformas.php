
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

    $parametro1 = '../';
    $parametro2 = "";


        echo insertar_menu($parametro1, $parametro2);


        echo"<section class='container-sm text-center my-2'>
        <div class='row gy-0 my-0 '>
            <div class='col-md-12 text-center'>
              <img src='../imagenes/series.png' class='img-fluid' alt='series'>
            </div>
        </div>
        </section>'";

        echo"<section class='container my-5'>
        <div class='row text-center' id='centrar'>
            <div class='col-md-12'>

                <h2>Nuestras Plataformas:</h2>
            </div>
        </div>
        </section>";



        echo"<div class='container-xl'>
        <div class='row gy-0 my-5' id='centrar' >";
                
                foreach($plataformas as $plataforma){
                    
                    echo'<div class="card my-5 mx-5" style="width: 18rem;"><a href="../controladores/controlador_plataformas.php?s1='.$plataforma['id'].'" >
                    <img src="'.$plataforma['logotipo'].'" class="card-img-top" alt="foto"></a>
                        <div class="card-body">
                            <h5 class="card-title">'.$plataforma['nombre'].'</h5>
                        </div>
                    </div>';
                }

            echo"</div>
        </div>
    </div>";    

    $p1 = '../extra/';
    $p2 = '../';

    echo insertar_footer($p1, $p2);

    

    ?>
</body>
</html>