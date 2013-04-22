<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__) . DS);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Test Suite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="images/css/bootstrap/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/shiv.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
  </head>

  <body>

     <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Test Básico</h1>
        <p>Este es un simple test que chequea permisos de lectura en carpeta para evitar contratiempos.</p>
        <p>Si no ves color rojo esta todo bien</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span3">
          <h2>Test # 1</h2>
<?php
/**
 * Chequeamos que el directorio images tenga permiso de escritura
 * 
 */ 
    if (file_exists(ROOT . 'images') && is_writable(ROOT . 'images')) {
        echo '<div class="alert alert-success"><strong>el directorio images/ tiene permisos de escritura</div>';
    } else {
        echo '<div class="alert alert-error">el directorio images/ NO existe o NO tiene permisos de escritura</div>';
    }
?>
        </div>
        <div class="span3">
          <h2>Test # 2</h2>
            <?php
/**
 * Chequeamos que el directorio images/proyectos tenga permiso de escritura
 * 
 */ 
    if (file_exists(ROOT . 'images/proyectos') && is_writable(ROOT . 'images/proyectos')) {
        echo '<div class="alert alert-success">el directorio images/proyectos tiene permisos de escritura</div>';
    } else {
        echo '<div class="alert alert-error">el directorio images/proyectos NO existe o NO tiene permisos de escritura</div>';    
    }            
            ?>
       </div>
        <div class="span3">
          <h2>Test # 3</h2>
        <?php
/**
* Chequeamos que el directorio lib/abismoApp/tmp tenga permiso de escritura
* 
*/ 
if (file_exists(ROOT . 'images/concursos') && is_writable(ROOT . 'images/concursos')) {
    echo '<div class="alert alert-success">el directorio images/concursos tiene permisos de escritura</div>';
} else {
    echo '<div class="alert alert-error">el directorio images/concursos NO existe o NO tiene permisos de escritura</div>';
}
            
        ?>
        </div>
        <div class="span3">
          <h2>Test # 4</h2>
          <?php
            /**
             * Chequeamos que el directorio lib/abismoApp/tmp tenga permiso de escritura
             * 
             */ 
            if (file_exists(ROOT . 'lib/abismoApp/tmp') && is_writable(ROOT . 'lib/abismoApp/tmp')) {
                echo '<div class="alert alert-success">el directorio lib/abismoApp/tmp tiene permisos de escritura</div>';
            } else {
                echo '<div class="alert alert-error">el directorio lib/abismoApp/tmp NO existe o NO tiene permisos de escritura</div>';
            }
        ?>
        </div>
      </div>

      <hr>

      <footer>
        <p></p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap/bootstrap-min.js"></script>

  </body>
</html>
