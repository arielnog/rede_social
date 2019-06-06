<?php
  session_start();
  error_reporting(1);
  include_once "conecta_bd.php";

  if ($_POST != null) {
  $curtida = addslashes( $_POST["curtida"]);

  $id_p = $_GET["id_post"];
  $id = $_SESSION["id_user"];


      $sql = "INSERT INTO curtida (id_post, id_user, curtida)
      VALUES ('$id_p','$id','$curtida')";


          $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Curtida Realizada!');
    location.href = 'comentario.php?id_post=$id_p';
    </script>";
  } else {
    echo "<script>
    alert('');
    location.href = 'comentario.php?id_post=$id_p';
    </script>";
  }
}
 ?>
