<?php
  include_once "conecta_bd.php";
  if ($_POST != null) {
  $post = addslashes( $_POST["post"]);
  $img = addslashes( $_POST["img"]);

  session_start();
  $id = $_SESSION['id_user'];

  $sql = "INSERT INTO postagem(post,img,id_user)
          VALUES ('$post','$img','$id')";

          $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Post Realizado');
    location.href = 'home.php';
    </script>";
  } else {
    echo "<script>
    alert('Não foi possivel realizar o post!');
    </script>";
  }
}
 ?>