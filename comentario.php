<?php
error_reporting(1);
include_once"conecta_bd";

session_start();

  if ($_SESSION["logado"] != "ok") {
    header("Location: login.php");
  }

 $id_post = $_GET["id_post"];

 ?>

<html>

<title> Comentário | Soccer Field</title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="img/favicon.png">
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/w3_2.css">
<link rel="stylesheet" href="css/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="vertical-align: middle;">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d2"><i class="far fa-futbol"></i> Soccer Field</a>
  <a href="perfil.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Meu Perfil"><i style="padding-top:9px;" class="fa fa-user"></i></a>
  <a href="todos_amigos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Amigos"><i style="padding-top:9px;" class="fas fa-user-friends"></i></a>
   <!--Logoff ta aqui-->
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Sair"><i style="padding-top:9px;" class="fa fa-power-off"></i></a>
  <!--Pesquisar Perfil, continua aparecendo o da sessão-->
  <a href="pesquisar_amigos.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Pesquisar Amigos"><i style="padding-top:9px;" class="fa fa-search"></i></a>
 </div>
</div>

<!-- Navbar responsiva -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">-</a>
  <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>
  <a href="todos_amigos.php" class="w3-bar-item w3-button w3-padding-large">Meus Amigos</a>
  <a href="pesquisar_amigos.php" class="w3-bar-item w3-button w3-padding-large">Pesquisar Pessoas</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:100%;margin-top:80px">

  <!--PHP para selecionar o post em questão-->
      <?php
      error_reporting(1);
      include_once "conecta_bd.php";


        $sql = "SELECT *,DATE_FORMAT(data_post, '%H:%i:%s %d/%m/%Y') as data_post
        FROM postagem
        INNER JOIN usuario
        ON usuario.id_user = postagem.id_user
        WHERE postagem.id_post = '{$id_post}'
        ORDER BY .postagem.data_post desc";

        $retorno = $con->query( $sql );

        while ($registro = $retorno->fetch_array()){


          $post = $registro["post"];
          $img = $registro["img"];
          $data_post = $registro["data_post"];

          $nome = $registro['nome'];
          $sobrenome = $registro['sobrenome'];
          $foto = $registro['foto'];


      echo
      "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
      <img src=$foto class='w3-left w3-margin-right' style='width:60px'>
      <span class='w3-right w3-opacity'>$data_post</span><br>
      <h4>$nome $sobrenome</h4>
      <br>
      <hr class='w3-clear'>
      <p>$post</p>
      <img src='$img' style='width:30%' class='w3-margin-bottom'>
      <br>";
      }
?>

<?php
error_reporting(1);
include_once "conecta_bd.php";

Echo"
    <hr class='w3-clear'>
    <form action='coment.php?id_post=$id_post' method='post'>
        <input type='text' class='w3-border w3-padding' style='width:50%;' name='comentario'>
        <button type='submit' class='w3-theme-d2 w3-border w3-padding'><i class='fa fa-comment'></i> Comentario</button>
    </form>
    <form action='curtida.php?id_post=$id_post' method='post'>
      <input type='hidden' name='curtida' value='1'>
      <button type='submit' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>  Like</button>
  </form>";
?>
  </div>

  <?php
  error_reporting(1);
  include_once "conecta_bd.php";

  $id_post = $_GET["id_post"];

    $sql = "SELECT comentario.*,postagem.id_post, usuario.id_user, usuario.nome,usuario.sobrenome,usuario.foto,DATE_FORMAT(data_comentario, '%H:%i:%s %d/%m/%Y') as data_comentario
    FROM comentario
    INNER JOIN usuario ON usuario.id_user = comentario.id_user
    INNER JOIN postagem ON postagem.id_post = comentario.id_post
    WHERE postagem.id_post = '{$id_post}'
    ORDER BY comentario.data_comentario desc";

    $retorno = $con->query( $sql );

    while ($registro = $retorno->fetch_array()){

      $id_post = $registro["id_post"];
      $id_comentario = $registro["id_comentario"];
      $comentario = $registro["comentario"];
      $data_comentario = $registro["data_comentario"];

      $id = $registro['id_user'];
      $nome = $registro['nome'];
      $sobrenome = $registro['sobrenome'];
      $foto = $registro['foto'];


  echo
  "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
  <img src=$foto class='w3-left w3-margin-right' style='width:60px'>
  <span class='w3-right w3-opacity'>$data_comentario</span><br>
  <h4>$nome $sobrenome</h4>
  <br>
  <hr class='w3-clear'>
  <p>$comentario</p>
  <br>
  </div>";

  }
?>

    </div>
  </div>
</div>
<br>

<footer class="w3-container w3-theme-d2 w3-padding-16">
  <p align="center">Created By:</p>
</footer>
<footer class="w3-container w3-theme-d2 w3-padding-16">
  <p align="center">Ariel Nogueira e Marcelo da Hora</p>
</footer>

<!--Script Usado no na responsividade do Navbar-->
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else {
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className =
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}


function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>


</body>
</html>
