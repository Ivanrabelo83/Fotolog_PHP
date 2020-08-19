<?php

$arquivopostagens='postagens.json';
$postagens = [];
if (file_exists($arquivopostagens)) {
    $postagens = json_decode(file_get_contents($arquivopostagens), true);
}


?>

<!DOCTYPE html>
<html>

    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.css"
            media="screen,projection" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: red;
        }

        main {
            flex: 1 0 auto;
        }

    .card-title {
    color: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    max-width: 100%;
    padding: -2px;
}
        </style>




    </head>

    <body>
        <nav>
            <nav class="cyan">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Logo</a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="postagem.php">Nova Postagem</a></li>
                        <li><a href="usuarios.php">Usuarios</a></li>
                        <li class="active"><a href="fotolog.php">Fotos</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class="container">
                    <?php
  
                if (count($postagens)) {
                  foreach ( $postagens as $i=>$p) {
                    if ($i % 2 == 0)
                    echo '<div class="row">';

               echo    '<div class="col s4 offset-s1">';
               echo    '<div class="card grey lighten-5 z-depth-3">';
               echo    '<div class="card-image">';
               echo    '<img src=" ' . $p['foto'] . ' ">';
               echo    '<span class="card-title grey-text text-darken-2">' . $p['titulo'] .  '</span>';
               echo    '</div>';
               echo    '<div class="card-content">';
               echo    '<span class="card-title grey-text text-darken-2">' .  $p['mensagem']  .'</span><br>';
               echo    '</div>';
               echo    '</div>';
               echo    '</div>';
              
     
      if ($i % 2 == 1)
      echo '</div>';

    }
  }
  else {

  }
 ?>


                </div>
            </main>

            <footer class="page-footer cyan grey-text darken-2-text">
                <div class="container">
                </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        ©2020 Copyright Fotolog
                        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                    </div>
                </div>
            </footer>


            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
            <script>
            $(document).ready(function() {
                $('select').formSelect();
            });
            </script>
    </body>

</html>