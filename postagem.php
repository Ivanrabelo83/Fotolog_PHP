<?php
$arquivousuarios = 'usuarios.json';
$arquivopostagens='postagens.json';
$erro_extensao_invalida = false;

$usuarios = [];
if (file_exists($arquivousuarios)) {
   $usuarios = json_decode(file_get_contents($arquivousuarios), true);
}
$postagens = [];
if (file_exists($arquivopostagens)) {
   $postagens = json_decode(file_get_contents($arquivopostagens), true);
}

if (isset($_FILES['foto']) && count($_POST)) {
   $nome = $_FILES['foto']['name'];
   $tam  = $_FILES['foto']['size'];
   $tipo = $_FILES['foto']['type'];
   $tmp  = $_FILES['foto']['tmp_name'];
   $path = 'fotolog' . $nome;
      
      
      
}

$extensoes = ["jpg", "jpeg", "png"];
$ext = explode('.', $nome);
$extensao = strtolower(end($ext));
$erro_extensao_invalida = ! in_array($extensao, $extensoes);

   if (!$erro_extensao_invalida && $tam > 0) {
      move_uploaded_file($tmp, $path);
      
      if (isset($_POST['usuario_id']) && ($_POST['usuario_id']<count($usuarios) ) ) {
         $usuario = $usuarios[ $_POST['usuario_id'] ]  ['nome'];
      }
   }
   else {
      $usuario = 'Usuario Desconhecido';
   }

   $titulo = $_POST['titulo'];
   $mensagem = $_POST['mensagem'];
   $foto = $path;
   $novopost = [ 'usuario'=>$usuario, 'titulo'=>$titulo, 'mensagem'=>$mensagem, 'foto'=>$foto ];
   $postagens[] = $novopost;
   file_put_contents($arquivopostagens, json_encode($postagens));

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
      </style>

   </head>

   <body>
      <nav>
         <nav class="cyan">
         <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Logo</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
               <li class="active"><a href="postagem.php">Nova Postagem</a></li>
               <li><a href="usuarios.php">Usuarios</a></li>
               <li><a href="fotolog.php">Fotos</a></li>
            </ul>
         </div>
         </nav>
         <main>
   <div class="container">
      <div class="row">

         <div class="col-s10 offset-s1">
               <div class="card grey lighten-5">
                  <div class="card-content">
   <span class="card-title grey-text text-darken-2">Poste uma foto!</span>
   <br>
   <form class="container" method="POST" enctype="multipart/form-data">
         <div class="row">
            <div class="input-field col s6">
               <select name="usuario_id">
                     <?php
                           if (count($usuarios)){
               echo '<option value="" disable selected>Quem é você</option>';
          foreach ($usarios as $id => $u) {
            echo '<option value=" '. $id .'">' . $u['nome'] . '</option>';
         }
                           }
                           else {
               echo '<option value="" disable selected>Cadastre novo usuario</option>';

                           }

         ?>
                     <option value="1">Ivan</option>
                     <option value="2">Renata</option>
               </select>
               <label></label>
            </div>
            <div class="file-field input-field col s6">
               <div class="btn cyan acent-4 col s2">
                     <span><i class="material-icons center">folder_open</i></span>
                     <input type="file" name="foto">
               </div>
               <div class="file-path-wrapper col s10">
                     <input class="file-path validate" type="text">
               </div>
            </div>
         </div>


         <div class="row">
            <div class="input-field col s12">
               <label for="titulo">Titulo do Post</label>
               <input type="text" id="titulo" name="titulo">
            </div>

         </div>

         <div class="row">
            <div class="input-field col s12">
               <label for="mensagem"></label>
               <textarea id="mensagem" name="mensagem"
                     class="materialize-text-area"></textarea>
            </div>
         </div>
         <div class="row">
            <div class="col s12 right-align">
               <button class="btn waves-efect waves-light"
                     type="submit">Submit</button>
            </div>

                     </div>
               </form>
            </div>
         </div>
   </div>

                     <!-- MENSAGEM DE ARQUIVO INVALIDO -->
                     <!-- <?php
                           if ($erro_extensao_invalida) {
                           ?>
                     <div class="row">
                           <div class="col s10 offset-s1"></div>
                           <div class="card-panel red  lighteen-4">
                              <span class="grey-text text-darken-3">
                                 Erro: O arquivo que vocÊ envivou nao é uma imagem valida.
                              </span>
                           </div>
                     </div>
                     
                     <?php
                           }
                     ?> -->
                     <!-- FIM DA MENSAGEM DE ARQUIVO INVALIDO -->

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
         <script>
         $(document).ready(function() {
               $('select').formSelect();
         });
         </script>
   </body>

</html>