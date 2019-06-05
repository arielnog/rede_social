<?php
  session_start();
  error_reporting(1);
  include_once "conecta_bd.php";

  $id = $_GET["id"];

  if ($_POST != null) {
  $status = addslashes( $_POST["status"]);

  $id_user = $_SESSION["id_user"];



      $sql = "UPDATE amigos
      SET status = '$status'
      WHERE id_solicitante = $id
      AND id_solicitado = $id_user";


          $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Solicitação aceita com sucesso!');
    location.href = 'home.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro em aceitar a amizade');
    </script>";
  }
}
 ?>
