<?php
// session_start();

//Funciones

function comprobar_sesion(){
  $valor = 0;
    if(isset($_SESSION['nick'])){
      if($_SESSION['nick'] == 'admin'){
        $valor = 1;
      }else{
        $valor = 2;
      }
    
      return $valor;
    }
  }



function insertar_menu($parametro1, $parametro2){
  
  if(!isset($_SESSION['nick'])){
 // menu para usuarios no registrados
      $cabecera = "<nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark' id='menu'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='".$parametro1."index.php'><img class='foto' img id='logo'  src='".$parametro1."imagenes/logo.png' ></a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav me-auto mb-2 mb-md-0'>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_inicio_sesion.php'>Iniciar Sesión</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."index.php'>Inicio</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_series.php'>Series</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_plataformas.php'>Plataformas</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."extra/blog.php'>Blog</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."extra/contactanos.php'>Contacta con nosotros</a>
          </li>
        </ul>
      
        </div>
      </div>
      </nav>";
      return $cabecera;
  }elseif($_SESSION['nick'] == 'admin'){ //usuario registrado como administrador
    $cabecera = "<nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark' id='menu'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='".$parametro1."index.php'><img class='foto' img id='logo'  src='".$parametro1."imagenes/logo.png' ></a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav me-auto mb-2 mb-md-0'>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."index.php'>Inicio</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_plataformas.php'>Plataformas</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_series.php'>Series</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_socios.php'>Socios</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_lanzamientos.php'>Lanzamientos</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_comentarios_admin.php'>Comentarios</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link'  href='".$parametro1."extra/blog.php'>Blog</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."extra/contactanos.php'>Contacta con nosotros</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link ' href='".$parametro2."controlador_cerrar_sesion.php'>Cerrar Sesión</a>
          </li>
        </ul>
      
        </div>
      </div>
      </nav>";
      return $cabecera;
  }else{ //usuario registrado normal
    $cabecera = "<nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark' id='menu'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='".$parametro1."index.php'><img id='logo' class='foto'  src='".$parametro1."imagenes/logo.png' ></a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav me-auto mb-2 mb-md-0'>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."index.php'>Inicio</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_series.php'>Series</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro2."controlador_plataformas.php'>Plataformas</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."extra/blog.php'>Blog</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='".$parametro1."extra/contactanos.php'>Contacta con nosotros</a>
          </li>
          <li class='nav-item'>
          <a class='nav-link ' href='".$parametro2."controlador_cerrar_sesion.php'>Cerrar Sesión</a>
          </li>
        </ul>
      
        </div>
      </div>
      </nav>";

    return $cabecera;
  }
  
}

function insertar_footer($parametro1, $parametro2)
{
    $footer = "    
              <footer class='page-footer font-small purple pt-4 ' id='colores'>

            <!-- Footer Links -->
            <div class='container-fluid text-center text-md-left'>
        
              <!-- Grid row -->
              <div class='row'>
        
                <!-- Grid column -->
                <div class='col-md-6 mt-md-0 mt-3'>
        
                  <!-- Content -->
                  <h5 class='text-uppercase'>Seriweb tu cluv de cine</h5>
                  <p>Participa e infórmate sobre nuestro club</p>
        
                </div>
                <!-- Grid column -->
        
                <hr class='clearfix w-100 d-md-none pb-3'>
        
                <!-- Grid column -->
                <div class='col-md-3 mb-md-0 mb-3'>
        
                  <!-- Links -->
                  <h5 class='text-uppercase'>Accede a:</h5>
        
                  <ul class='list-unstyled'>
                    <li>
                      <a href='".$parametro1."politica_cookies.php'>Política de cookies</a>
                    </li>
                    <li>
                      <a href='".$parametro1."potitica_privacidad.php'>Política de privacidad</a>
                    </li>
                    <li>
                      <a href='".$parametro1."avisos_legales.php'>Avisos legales</a>
                    </li>
                  </ul>
        
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class='col-md-3 mb-md-0 mb-3'>
        
                  <!-- Links -->
                  <h5 class='text-uppercase'>Accede a:</h5>
        
                  <ul class='list-unstyled'>
                    <li>
                      <a href='".$parametro2."index.php'>Inicio</a>
                    </li>
                    <li>
                      <a href='".$parametro1."blog.php'>Blog</a>
                    </li>
                    <li>
                      <a href='".$parametro1."contactanos.php'>Contactanos</a>
                    </li>
                  </ul>
        
                </div>
                <!-- Grid column -->
        
              </div>
              <!-- Grid row -->
        
            </div>
            <!-- Footer Links -->
        
            <!-- Copyright -->
            <div class='footer-copyright text-center py-3'>© 2018 Copyright:
              <a href='#'>SERIWEB@bdt.com</a>
            </div>
            <!-- Copyright -->
        
          </footer>";
    return $footer;
}

function fecha($f){
  $f1 = strtotime($f);

  $bien = date('d-m-Y', $f1);

  return $bien;

}


?>