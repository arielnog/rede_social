<?php

error_reporting(1);

//Import
include_once "conecta_bd.php";

if ($_POST != null) {
  $email = addslashes( $_POST["email"]);
  $senha = addslashes( $_POST["senha"]);

  $senha = md5( $senha );

  $sql = "SELECT *, DATE_FORMAT(aniversario, '%d/%m/%Y') as aniversario
          FROM usuario
          WHERE email = '$email'
          AND senha = '$senha'";

  $retorno = $con->query( $sql );

  //$qtd = $retorno->num_rows;

  $registro= $retorno->fetch_array();

  if ( $registro ) {

    session_start();

    $_SESSION["logado"] = "ok";
    $_SESSION["nome_user"] = $registro["nome"];
    $_SESSION["id_user"] = $registro["id_user"];
    $_SESSION["sobrenome_user"] = $registro["sobrenome"];
    $_SESSION["cidade_user"] = $registro["cidade"];
    $_SESSION["estado_user"] = $registro["estado"];
    $_SESSION["time_user"] = $registro["time"];
    $_SESSION["aniversario_user"] = $registro["aniversario"];
    $_SESSION["foto_user"] = $registro["foto"];
    $_SESSION["sexo"] = $registro["sexo"];
    $_SESSION["jogador"] = $registro["jogador"];


    header("Location: home.php ");



  } else {
    echo "<script>
    alert('Usuario ou senha Incorreto!');
    </script>";
  }
}

?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Login | Soccer Field</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/icons/default.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet">



</head>

<body class="fullscreen-centered page-login">

  <div id="background-wrapper"  data-stellar-background-ratio="0.8">
    <div id="content">
      <div class="header">
        <div class="header-inner">
            <h2>Soccer Field</h2>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  Login
                </h3>
            </div>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                      <input type="email" name="email" class="form-control" placeholder="Digite seu E-mail">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha">
                    </div>
                  </div>
                  <input type="submit" class="btn btn-lg btn-sucess btn-block" value="Enviar">
                </fieldset>
              </form>
              <p class="m-b-0 m-t">Não é cadastrado?<a href="register.php">  Cadastre-se Aqui!</a></p>
              <div class="credits">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="contactform/contactform.js"></script>

  <script src="js/custom.js"></script>
<!--Não sei a necessidade disso-->
  <script src="contactform/contactform.js"></script>

</body>

</html>
