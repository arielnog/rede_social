<?php

error_reporting(1);

//Import
include_once "conecta_bd.php";

if ($_POST != null) {
  $email = addslashes( $_POST["email"]);
  $senha = addslashes( $_POST["senha"]);
  $foto = addslashes( $_POST["foto"]);
  $nome = addslashes( $_POST["nome"]);
  $sobrenome = addslashes( $_POST["sobrenome"]);
  $aniversario = addslashes( $_POST["aniversario"]);
  $sexo = addslashes( $_POST["sexo"]);
  $estado = addslashes( $_POST["estado"]);
  $cidade = addslashes( $_POST["cidade"]);
  $time = addslashes( $_POST["time"]);
  $jogador = addslashes( $_POST["jogador"]);

  $sql = "INSERT INTO usuario(email,senha,foto,nome,sobrenome,aniversario,sexo,estado,cidade,time,jogador)
          VALUES ('$email',md5('$senha'),'$foto','$nome','$sobrenome','$aniversario','$sexo','$estado','$cidade','$time','$jogador')";


          $retorno = $con->query( $sql );

  if ($retorno == true) {
    echo "<script>
    alert('Usuario Cadastrado com Sucesso!');
    location.href = 'login.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro ao Cadastrar o Usuario!');
    </script>";
  }
}
?>


<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Registro | Soccer Field</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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


<body class="fullscreen-centered page-register">

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
                  Cadastro
                </h3>
            </div>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post">
                <fieldset>
                  <legend class="legend-ajust">Informações de Login</legend>

                  <div class="form-group group-ajust">
                    <div class="input-group input-group-lg ">
                      <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                      <input type="text" name="email" class="form-control" placeholder="Ex. nome@provedor.com" required>
                    </div>
                  </div>
                  <div class="form-group group-ajust">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" name="senha" class="form-control" placeholder="*******" required>
                    </div>
                  </div>
                  <div class="form-group group-ajust">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-picture-o"></i></span>
                      <input type="url" name="foto" class="form-control" placeholder="Insira o link da sua foto">
                    </div>
                  </div>

                </fieldset>
                  <fieldset>
                    <legend class="legend-ajust">Dados Pessoais</legend>
                    <div class="form-group" align="center">
                    <label >
                      Nome:
                        <input type="text" name="nome" placeholder="Digite seu nome" required>
                    </label>

                    <label class="margem">
                      Sobrenome:
                        <input type="text" name="sobrenome"  placeholder="Digite seu sobrenome" required>
                    </label>

                    <label class="margem">
                      Data de Nascimento:
                        <input type="date" name="aniversario" required>
                    </label>


                  <div class="form-group">
                    <div class="radio margem-baixo">
                      <span>Sexo: </span>
                      <label>
                          <input type="radio" name="sexo" id="optionsRadios1" value="Masculino" checked>
                          Masculino
                        </label>
                        <label>
                          <input type="radio" name="sexo" id="optionsRadios2" value="Feminino">
                          Feminino
                        </label>
                         <label>
                          <input type="radio" name="sexo" id="optionsRadios3" value="Indefinido">
                          Indefinido
                        </label>
                      </div>
                    </div>

                    <div class="form-group" align="center">

                      <div class="select">
                        <label>
                          Estado:
                        <select name="estado" required>
                          <option value="Nada">-----</option>
                          <option value="Acre">AC</option>
                          <option value="Alagoas">AL</option>
                          <option value="Amapa">AP</option>
                          <option value="Amazonas">AM</option>
                          <option value="Bahia">BA</option>
                          <option value="Ceara">CE</option>
                          <option value="Distrito Federal">DF</option>
                          <option value="Espirito Santo">ES</option>
                          <option value="Goias">GO</option>
                          <option value="Maranhão">MA</option>
                          <option value="Mato Grosso">MT</option>
                          <option value="Mato Grosso Sul">MS</option>
                          <option value="Minas Gerais">MG</option>
                          <option value="Pará">PA</option>
                          <option value="Paraiba">PB</option>
                          <option value="Paraná">PR</option>
                          <option value="Pernanbuco">PE</option>
                          <option value="Piaui">PI</option>
                          <option value="Rio de Janeiro">RJ</option>
                          <option value="Rio Grande do Norte">RN</option>
                          <option value="Rio Grande do Sul">RS</option>
                          <option value="Rondonia">RO</option>
                          <option value="Roraima">RR</option>
                          <option value="Santa Catarina">SC</option>
                          <option value="São Paulo">SP</option>
                          <option value="Sergipe">SE</option>
                          <option value="Tocantins">TO</option>
                        </select>
                        </label>
                        <label >
                          Cidade:
                            <input type="text" name="cidade" placeholder="Ex. Feira de Santana">
                        </label>
                      </div>
                    </div>
                    </fieldset>

                  <fieldset>
                    <legend class="legend-ajust">Informações do Time</legend>

                    <div class="form-group margem-baixo" align="center">
                    <label>
                      Time Preferido?
                        <input type="text" name="time" placeholder="Ex. Galicia E.C" required>
                    </label>

                    <label class="margem">
                      Jogador Preferido?
                        <input type="text" name="jogador" placeholder="Ex. Tostão">
                    </label>

                  </div>
                </fieldset>
                  </div>



               <div class="button-ajuste" align="center">
                  <button class="btn btn-sucess medio" type="submit" name="Registrar">Registrar</button>
                  <button class="btn btn-primary medio" type="reset" name"Limpar">Limpar</button>
                  <a href="login.php" class="btn btn-danger medio" type="button" name="Voltar">Voltar</a>
                </div>
              </form>


              </div>
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


  <script src="contactform/contactform.js"></script>

</body>

</html>
