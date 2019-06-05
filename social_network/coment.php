<?php
  session_start();
  error_reporting(1);
  include_once "conecta_bd.php";

  if ($_POST != null) {
  $comentario = addslashes( $_POST["comentario"]);

  $id_p = $_GET["id_post"];
  $id = $_SESSION["id_user"];


  $sql = "INSERT INTO comentario(id_post,id_user,comentario)
          VALUES ('$id_p','$id','$comentario')";

          $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Comentario Realizado!');
    location.href = 'comentario.php?id_post=$id_p';
    </script>";
  } else {
    echo "<script>
    alert('Não foi possivel realizar o comentario!');
    location.href = 'comentario.php?id_post=$id_p';
    </script>";
  }
}
 ?>
