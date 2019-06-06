<?php
include_once "conecta_bd.php";
session_start();


  if ($_SESSION["logado"] != "ok") {
    header("Location: login.php");
  }

 ?>

<html>

<title>Home | Soccer Field</title>
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



<div class="w3-container w3-content" style="max-width:100%;margin-top:80px">
  <div class="w3-row">

    <div class="w3-col m3">
      <!-- Perfil -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"> <?php echo $_SESSION["nome_user"]." ".$_SESSION["sobrenome_user"];?> </h4>
         <h4 class="w3-center"><?php echo '<img src="' . $_SESSION["foto_user"]. '"  height="20%" width="30%">';?> </h4>
         <hr>
         <p><i class="fa fa-heartbeat fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION["time_user"];?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php  echo $_SESSION["cidade_user"].', '.$_SESSION["estado_user"];?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["aniversario_user"]; ?></p>
        </div>
      </div>
      <br>


      <!-- Alerta de Bem Vindo -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p>Bem vindo a <strong>Soccer Field</strong> !</p>
        <p>Sua rede social, voltada para o "mundo da bola".</p>
      </div>
    </div>




    <div class="w3-col m7">
    <!-- Faça sua Publicação-->
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <form action="post.php" method="post">
              <div class="w3-container w3-padding" align="center">
                <h6 class="w3-opacity">Crie sua Publicação</h6>
                <input type="text" name="img" class="w3-border w3-padding" autocomplete="off" style="width:50%;" placeholder="Informe o link da sua imagem">
                <span class="w3-border w3-padding"><i class="fa fa-image"></i></span> <br><br>
                <input type="text" name="post" class="w3-border w3-padding" autocomplete="off" style="width:50%;" placeholder="Digite seu post">
                <br><br><button type="submit" value="Enviar" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>


    <!-- Publicações só de seus amigos e suas -->
      <?php
        error_reporting(1);
        include_once "conecta_bd.php";

        $id_user = $_SESSION["id_user"];

            $sql = "SELECT a.id_post, a.post, a.img, a.data_post, a.id_user, b.id_user, b.nome,b.sobrenome,b.foto
            FROM postagem as a
            INNER JOIN usuario as b ON a.id_user = b.id_user
            INNER JOIN amigos as c ON a.id_user = c.id_solicitado
            WHERE c.status=2
            AND c.id_solicitante='{$id_user}'
            UNION
            SELECT a.id_post, a.post, a.img, a.data_post, a.id_user, b.id_user, b.nome,b.sobrenome,b.foto
            FROM postagem as a
            INNER JOIN usuario as b ON a.id_user = b.id_user
            INNER JOIN amigos as c ON a.id_user = c.id_solicitante
            WHERE c.id_solicitado='{$id_user}'
            AND c.status=2
            UNION
            SELECT DISTINCT a.id_post, a.post, a.img, a.data_post, a.id_user, b.id_user, b.nome,b.sobrenome,b.foto
            FROM postagem as a
            INNER JOIN usuario as b ON a.id_user = b.id_user
            WHERE b.id_user='{$id_user}'
            ORDER BY data_post desc";


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
          <a href='comentario.php?id_post=$id_post'><button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comentario</button></a>
      </div>";
        }
        ?>
    </div>



    <div class="w3-col m2">
    <!-- Solicitação de Amizade -->
    <div class="w3-card w3-round w3-white w3-center">
<?php
  error_reporting(1);
  include_once "conecta_bd.php";
  $id_user = $_SESSION["id_user"];


  $sql ="SELECT *
  FROM amigos as a
  INNER JOIN usuario as b
  ON a.id_solicitante = b.id_user
  WHERE a.id_solicitado= '{$id_user}'
  AND a.status = 1";

  $retorno = $con->query( $sql );

  while ($registro = $retorno->fetch_array()){

    $status = $registro["status"];

    $id = $registro["id_user"];
    $nome = $registro["nome"];
    $sobrenome = $registro["sobrenome"];
    $foto = $registro["foto"];


    Echo"
        <div class='w3-container'>
          <p>Solicitação de Amizade</p>
          <img src=$foto style='width:50%'><br>
          <span>$nome $sobrenome</span>
          <div class='w3-row w3-opacity'>
            <div class='w3-half'>
            <form action='aceitar_solicitacao.php?id=$id' method='post'>
              <input type='hidden' name='status' value='2'>
              <button class='w3-button w3-block w3-green w3-section' type='submit' title='Aceitar'><i class='fa fa-check'></i></button>
            </form>
            </div>
            <div class='w3-half'>
            <form action='recusar_solicitacao.php?id=$id' method='post'>
              <button class='w3-button w3-block w3-red w3-section' type='submit' title='Rejeitar'><i class='fa fa-remove'></i></button>
            </form>
            </div>
          </div>
          <hr>";

        }
  ?>
        </div>
      </div>
      <br>
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
// Accordion
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

// Para o navbar responsivo
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
