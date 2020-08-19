<?php
 
$arquivousuarios = 'usuarios.json';
 
if(count($_POST)){
    $usuario = $_POST;
    $usuarios = [];
    if (file_exists($arquivousuarios)){ 
    $usuarios = json_decode(file_get_contents($arquivousuarios), true);
}   
$usuarios[] = $usuario;
file_put_contents($arquivousuarios, json_encode($usuarios) );
}

$usuarios = [];
if (file_exists($arquivousuarios)) {
    $usuarios = json_decode(file_get_contents($arquivousuarios), true);
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
            font-family: 'Exo 2', sans-serif;
        }

        main {
            flex: 1 0 auto;
        }
        .white-text p{
           text-align:center;
           padding:2px;
           background-color:#00BCD4;


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
                        <li class="active"><a href="usuario.php">Usuarios</a></li>
                        <li><a href="fotolog.php">Fotos</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col s8 offset-s2">
                            <div class="card  lighten-5">
                                <div class="card-content">
                                    <span class="card-title grey-text text-darken-4">Cadastre um novo usuário</span>
                                    <br>

                                    <?php
 
                                    if (count($usuarios)){
                                          echo '<ul class="collection  blue-text text-darken-2">';
                                        foreach($usuarios as $u){
                                            echo '<li class="collection-item avatar col s12">';
                                            echo '<i class="material-icons circle">acount_circle</i>';
                                            echo '<span class="title">' . $u['nome'] . '</span>';
                                            echo '<p>' . $u['email'] . ' <br></p> ';
                                            echo '<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                     } 
                                    else {
                                    ?>
                                    <div class="row">
                                        <div class="col s10 offset-s1">
                                            <div class="card blue darken-2">
                                                <span class="white-text">
                                                    <p>Você não possui nenhum usuario cadastrado</p>
                                                    <!-- <p>Cadastre um novo usuario para utilizar o fotolog</p> -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                            ?>


                                </div>
                                <div class="card-action">
                                    <form class="container" method="post">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input placeholder="Nome ou Apelido" id="nome" name="nome" type="text"
                                                    class="validate">
                                                <label for="nome">Nome</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input placeholder="email@dominio" id="email" name="email" type="email"
                                                    class="validate">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col s12 right-align">
                                                <button class="btn waves-effect waves-light" type="submit">Cadastrar
                                                    <!-- <i class="material-icons right">send</i> -->
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    </body>

</html>