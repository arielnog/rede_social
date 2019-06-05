<?php
session_start();
error_reporting(1);
include_once "conecta_bd.php";

  $id_user = $_SESSION["id_user"];
  $id = $_GET["id"];

  $sql = "DELETE FROM amigos
          WHERE id_solicitado = $id
          AND id_solicitante = $id_user";


  $retorno = $con->query( $sql );


  if ($retorno == true) {
    echo "<script>
    alert('Amizade Desfeita!');
    location.href = 'home.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro ao desfazer a amizade!');
    location.href = 'home.php';
    </script>";
  }
?>
