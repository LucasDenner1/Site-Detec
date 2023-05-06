<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
    <?php
    session_start();
    ?>
<body>
    <div class="background-image"></div>
    <div class="container">
    <img class="logo" src="imagens/LOGO.png">
        <form id="cadastro-form" method="post" action="inserir.php">
            <h1 id="titulo">CADASTRO</h1>
            <input type="text" id="nome" name="nome" class="input" placeholder="Nome" value="<?php
             if(!empty($_SESSION["nomeclone"])){
                echo $_SESSION["nomeclone"];
                $_SESSION["nomeclone"] = "";
            } 
            ?>"
             required>

            <input type="email" id="email" name="email" class="input" placeholder="Email" value="<?php
             if(!empty($_SESSION["emailclone"])){
                echo $_SESSION["emailclone"];
                $_SESSION["emailclone"] = "";
            } 
            ?>"
            required>

            <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
            <input type="password" id="confirmarsenha" name="confirmarsenha" class="input" placeholder="Confirmar Senha" required>
            <?php
                echo"<div><spam class='error'>".$_SESSION["Conflito"]."</spam></div>";
                $_SESSION["Conflito"] = "";
            ?>
            <input type="submit" value="Cadastrar" class="button">
        </form>
    </div>
</body>
</html>