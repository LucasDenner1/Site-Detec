<?php
session_start();
if(empty($_SESSION['intruso'])){
    print "<script>location.href= 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
  <div class="background-image"></div>
  <img class="logo" src="imagens/LOGO.png">
  <nav>
    <div>
        <?php
        print "<a href='logout.php'>sair</a>";
        ?>
    </div>
  </nav>
</body>
</html>