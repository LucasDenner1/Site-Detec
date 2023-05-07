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
    <img class="logo" src="imagens/LOGO.png">
    <div class="container">
        <form id="cadastro-form" method="post" action="inserir.php">
            <h1 id="titulo">CADASTRAR</h1>
            <input type="text" id="nome" name="nome" class="input" placeholder="NOME" value="<?php
             if(!empty($_SESSION["nomeclone"])){
                echo $_SESSION["nomeclone"];
                $_SESSION["nomeclone"] = "";
            } 
            ?>"
             required>

            <input type="email" id="email" name="email" class="input" placeholder="EMAIL" value="<?php
             if(!empty($_SESSION["emailclone"])){
                echo $_SESSION["emailclone"];
                $_SESSION["emailclone"] = "";
            } 
            ?>"
            required>

            <input type="password" id="senha" name="senha" class="input" placeholder="SENHA" required>
            <input type="password" id="confirmarsenha" name="confirmarsenha" class="input" placeholder="CONFIRMAR SENHA" required>
            <?php

            if(isset($_SESSION["Conflito"])) {
                echo"<div><spam class='error'>".$_SESSION["Conflito"]."</spam></div>";
                unset($_SESSION["Conflito"]);
            }
                
            ?>
            <input type="submit" value="CADASTRAR" class="button">
            <p id="vanc">Já é Cadastrado? Faça <a id= "ancora" href="index.php">Login</a>.</p>
        </form>
    </div>
</body>
</html>