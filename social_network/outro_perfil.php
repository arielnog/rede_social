<?php
include_once "conecta_bd.php";
session_start();

$id = $_GET["id"];

if ($_SESSION["logado"] != "ok") {
  header("Location: login.php");
}

if ($id == NULL) {
    echo "O ID não foi passado! <br><br>";
  }

$sql = "SELECT *, DATE_FORMAT(aniversario, '%d/%m/%Y') as aniversario
        FROM usuario
        WHERE id_user = $id";

$retorno = $con->query( $sql );

while ( $registro = $retorno->fetch_array() ){

  $id = $registro["id_user"];
  $nome = $registro["nome"];
  $sobrenome = $registro["sobrenome"];
  $foto = $registro["foto"];
  $time = $registro["time"];
  $jogador = $registro["jogador"];
  $aniversario = $registro["aniversario"];
  $cidade = $registro["cidade"];
  $estado = $registro["estado"];
  $sexo = $registro["sexo"];
}
?>

<html>

<title> Meu Perfil | Soccer Field</title>
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


<div class="w3-top">
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
    <a href="pesquisar.php" class="w3-bar-item w3-button w3-padding-large">Pesquisar Pessoas</a>
    <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>
  
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:80%;margin-top:80px">
  
  <div class="w3-row">
    <div class="w3-card w3-round w3-white">
        <div class="w3-container">     
         <h4 class="w3-center"><?php echo "$nome $sobrenome";?></h4>
         <h4 class="w3-center"><img width="150px" src='<?php echo $foto;?>'></h4>
         <hr>
         <p><i class="fa fa-heartbeat fa-fw w3-margin-right w3-text-theme"></i><?php echo $time;?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $cidade, $estado;?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $aniversario;?></p>
         <p><i class="fas fa-running fa-fw w3-margin-right w3-text-theme"></i><?php echo $jogador; ?></p>
         <p><i class="fas fa-venus-mars fa-fw w3-margin-right w3-text-theme"></i> <?php echo $sexo; ?></p>
        </div>
      </div>
      <br>

    
    <!--Publicações do Usuario-->
      <?php
          error_reporting(1);
          include_once "conecta_bd.php";

          $id = $_GET["id"];

          $sql = "SELECT postagem.id_post, postagem.post, postagem.img, postagem.data_post, postagem.id_user, usuario.id_user, usuario.nome,usuario.sobrenome,usuario.foto
          FROM postagem
          INNER JOIN usuario
          ON usuario.id_user = postagem.id_user
          WHERE postagem.id_user = $id
          ORDER BY .postagem.data_post desc";

            $retorno = $con->query( $sql );

            while ($registro = $retorno->fetch_array()){

              $id_post = $registro["id_post"];
              $post = $registro["post"];
              $img = $registro["img"];
              $data_post = $registro["data_post"];

              $id = $registro['id_user'];
              $nome = $registro['nome'];
              $sobrenome = $registro['sobrenome'];
              $foto = $registro['foto'];

              echo
                "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
                  <img src=$foto class='w3-left w3-margin-right' style='width:60px'>
                  <span class='w3-right w3-opacity'>$data_post </span><br>
                  <h4>$nome $sobrenome</h4>
                  <br>
                  <hr class='w3-clear'>
                  <p>$post</p>
                  <img src='$img' style='width:30%' class='w3-margin-bottom'>
                  <br>
              </div>";
                }

?>
    
    </div>
  </div>
</div>
<br>

<!-- Rodapé -->
<footer class="w3-container w3-theme-d2 w3-padding-16">
  <p align="center">Created By:</p>
</footer>
<footer class="w3-container w3-theme-d2 w3-padding-16">
  <p align="center">Ariel Nogueira e Marcelo da Hora</p>
</footer>

  
  
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
