<?php
  session_start();
  error_reporting(1);
  include_once "conecta_bd.php";

  $id = $_GET["id"];

  if ($_POST != null) {
  $status = addslashes( $_POST["status"]);

  $id_user = $_SESSION["id_user"];



      $sql = "INSERT INTO amigos (id_solicitante, id_solicitado, status)
      VALUES ('$id_user','$id','$status')";


          $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Solicitação enviada com sucesso!');
    location.href = 'pesquisar_amigos.php';
    </script>";
  } else {
    echo "<script>
    alert('Amizade já solicitado');
    location.href = 'pesquisar_amigos.php';
    </script>";
  }
}
 ?>
