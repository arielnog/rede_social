error_reporting(1);
include_once "conecta_bd.php";

    $sql = 'SELECT postagem.id_post, postagem.post, postagem.img, postagem.data_post, postagem.id_user, usuario.id_user, usuario.nome,usuario.sobrenome,usuario.foto
    FROM postagem
    INNER JOIN usuario
    ON postagem.id_user = usuario.id_user';

    $retorno = $con->query( $sql );
    echo $retorno;
    exit(1);

  while ($registro = $retorno->fetch_array()){




    <?php
    include_once "conecta_bd.php";
    $id = $_GET["id"];

    $sql = "SELECT *
            FROM usuario
            WHERE id=$id";

    $retorno = $con->query( $sql );

    while ( $registro = $retorno->fetch_array() ){

      $id = $registro["id_user"];
      $nome = $registro["nome"];
      $sobrenome = $registro["sobrenome"];
      $foto = $registro["foto"];
      $time = $registro["time"];
      $jogador = $registro["jogador"];
      $aniversario = $registro["aniversairo"];
      $cidade = $registro["cidade"];
      $estado = $registro["estador"];
      $sexo = $registro["sexo"];

      <?php
          error_reporting(1);
          include_once "conecta_bd.php";

            $sql = "SELECT postagem.id_post, postagem.post, postagem.img, postagem.data_post, postagem.id_user, usuario.id_user, usuario.nome,usuario.sobrenome,usuario.foto
            FROM postagem
            INNER JOIN usuario
            ON postagem.id_user = usuario.id_user
            ORDER BY .postagem.data_post desc";

            $retorno = $con->query( $sql );

            while ($registro = $retorno->fetch_array()){

              $id_post = $registro["id_post"];
              $post = $registro["post"];
              $img = $registro["img"];
              $data_post = $registro["data_post"];

              session_start();
                $id = $_SESSION['id_user'];
                $nome = $_SESSION['nome'];
                $sobrenome = $_SESSION['sobrenome'];
                $foto = $_SESSION['foto'];



      echo
        "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
          <img src=$foto class='w3-left w3-margin-right' style='width:60px'>
          <span class='w3-right w3-opacity'>$data_post</span><br>
          <span class='w3-right w3-opacity'><a href='apagar.php?id_post=$id_post'<button type='submit' action='apagar.php' class='w3-button'>Apagar</button></a></span>
          <h4>$nome $sobrenome</h4>
          <br>
          <hr class='w3-clear'>
          <p>$post</p>
          <img src='$img' style='width:30%' class='w3-margin-bottom'>
          <br>
          <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>  Like</button>
          <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</button>
      </div>";



      $sql = "SELECT Count(comentario)
                        FROM  comentario
                        WHERE id_post=$id_post";

      $retorno = $con->query( $sql );

      while ($registro = $retorno->fetch_array()){
