
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

                <h2>Información avanzada de la serie:</h2>
            </div>
        </div>
        </section>";

        echo"<div class='container-sm'>
                <div class='row gy-0 my-5' id='centrar' >
                <div class='col-md-9 justify-content-center'>";

                    echo"<h3>".$series['nombres']."</h3>";
                    echo"<img src = '../imagenes/".$series['foto']."' alt ='foto'><br>";
                    echo "<h5 class='my-5'>".$series['descripcion']."</h5>";
                echo"</div>
            </div>
        </div>";

        echo"<section class='container my-5'>
        <div class='row text-center' id='centrar'>
            <div class='col-md-12'>
                <h2>Dónde ver la serie:</h2>
            </div>
        </div>
        </section>";


        echo"<div class='container-xl'>
        <div class='row gy-0 my-5' id='centrar' >";
        

                // $i=0;
                foreach($plataformaDescr as $serie){
                    $fechaa = $serie['platafe'];
                    $fechab = fecha($fechaa);
                    echo'<div class="card my-5 mx-5" style="width: 18rem;">
                        <img src="'.$serie['plataf'].'" class="card-img-top" alt="foto">
                        <div class="card-body">
                            <h5 class="card-title">DATOS:</h5>
                            <p class="card-text">'.$serie['platan'].'</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">'.$fechab.'</li>
                        </ul>
                    </div>';
                }

                        echo"</div>
                    </div>
                </div>";


    if(isset($_SESSION['nick'])){
        if($_SESSION['nick'] != 'admin'){


        echo"<section class='container my-5'>
        <div class='row text-center' id='centrar'>
            <div class='col-md-12'>

                <h2>Comentarios:</h2>
            </div>
        </div>
        </section>";

            echo"<section class='container-sm'>
                <div class='row gy-0 my-5' id='centrar' >";

                foreach($comentariosSerie as $se){

                    
                    echo"<div class='col-md-9 justify-content-center'>";

                            echo"<h3>- ".$se['socio']."- </h3>";
                            echo "<h5>''".$se['texto']."''</h5>";
                        echo"</div>";
                }
                    echo"</div>
                </section>";

                    //     echo'<section>
                    //     <div class="container-md my-5">
                    //       <div class="row align-items-center text-center">
                    //         <div class="col-md-12">
                    //           <div class="accordion accordion-flush" id="accordionFlushExample">
                    //           ';
                    //           foreach($comentariosSerie as $serie){
                    //            echo'<div class="accordion-item text-center">
                    //               <h2 class="accordion-header" id="flush-headingOne">
                    //                 <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    //                   '.$serie['socio'].'
                    //                 </button>
                    //               </h2>
                    //               <div id="flush-collapseOne" class="accordion-collapse collapse text-center" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    //                 <div class="accordion-body">'.$serie['texto'].'</div>
                    //               </div>
                    //             </div>
                    //           </div>
                    //         </div>
                    //       </div>
                    //     </div>
                    // </section>';

                    echo"<section class='container-md my-5'>
                    <div class='row gy-0 my-0' id='centrar'>
                        <div class='col-md-12 text-center align-self-center'>
                        <h2>Añadir Comentario</h2>
                        <form action = '../controladores/controlador_series.php' method = 'post'>
                        <input type ='hidden' name = 'serie' value = '".$series[0]['iduso']."'>
                        <div class='input-group'>
                        <span class='input-group-text'>TEXTO:</span>
                        <textarea class='form-control' aria-label='With textarea' name='texto' required></textarea>
                        </div>
                          <button type='submit' class='btn btn-primary' name = 'comentar'>Enviar</button>
                          </form>
                          </table>
                          </div>
                        </div>
                    </section>
                    ";

    
                }
            }
            $p1 = '../extra/';
            $p2 = '../';
        
            echo insertar_footer($p1, $p2);

    

    ?>
</body>
</html>