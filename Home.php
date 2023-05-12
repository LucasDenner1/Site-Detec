<?php
session_start();
if (empty($_SESSION['intruso'])) {
  print "<script>location.href= 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
  <link rel="stylesheet" href="teste.css">

</head>

<body>
  <div class="background-image"></div>
  <nav class="container">
    <div class="logo">
      <img src="../detec/imagens/Logo.png" alt="">
    </div>
    <div class="usuario" onclick="abrirMenu()">
      <img src="../detec/imagens/usuario-p.png" alt="">
      <div id="menu" class="menuUser">
        <a href="perfil.php">Perfil</a>
        <a href="logout.php">Sair</a>
      </div>
    </div>
  </nav>
  <div>
    <img class="pata" src="../detec/imagens/Pata-dog.png">
    <h1>Forum</h1>
  </div>

  <script>
    function abrirMenu() {
      const menu = document.getElementById("menu")
      aberto = window.getComputedStyle(menu).getPropertyValue("display")
      if (aberto == "none") {
        menu.style.display = "flex"

      } else {
        menu.style.display = "none"
      }
    }
  </script>

    <div id="addPubli"class="containerPubli"> <!--Div de adicionar algo  // iago-->
      <img id="mais"src="./imagens/maism.png">
    </div>

  <!-- Esse é o código que você terá que meter o pau -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publicação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modalForm" method="post" action="publicacao.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" id="recipient-name" name="titulo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Texto:</label>
            <textarea class="form-control" id="message-text" name="texto"></textarea>
          </div>
          <input type="hidden" name="data_hora" value="<?php echo date('Y-m-d H:i:s'); ?>">
          <div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

</html>