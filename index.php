<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Confirmação do cadastro -->
    <?php
    session_start();
    if($_SESSION["GDS"]){
        ?>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      
      Swal.fire({
      title: 'CADASTRO REALIZADO COM SUCESSO',
      width: 600,
      padding: '3em',
      color: '#fff',
      background: '#585757',

    })
    </script>
  <style>

  .swal2-confirm.swal2-styled{
         background-color: #8BDE38;
         display:none;
     } 
  </style>
        <?php
    }
    $_SESSION["GDS"] = "";
    ?>

  <div class="background-image"></div>
  <div class="container">
    <h1 id="titulo">Login</h1>
    <form id="login-form" method="post" action="comparar.php">
      <input type="email" id="email" name="email" class="input" placeholder="Email" required>
      <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
      <input type="submit" value="Entrar" class="button">
    </form>
  </div>

</body>
</html>