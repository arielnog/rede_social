<?php
error_reporting(1);
include_once "conecta_bd.php";

  $id_post = $_GET["id_post"];

  $sql = "DELETE FROM postagem
          WHERE id_post = $id_post";


  $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Post Deletado!');
    location.href = 'perfil.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro ao deletar!');
    </script>";
  }
?>
