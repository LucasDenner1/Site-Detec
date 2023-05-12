<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <!-- Confirmação do cadastro -->
    <?php
    session_start();
    if (!empty($_SESSION["GDS"])) {
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
            .swal2-confirm.swal2-styled {
                background-color: #8BDE38;
                display: none;
            }
        </style>
    <?php
    }
    $_SESSION["GDS"] = "";
    ?>
    <div class="background-image"></div>
    <img class="logo" src="imagens/Logo.png">
    <div class="container">
        <form id="login-form" method="post" action="comparar.php">
            <h1 id="titulo">LOGIN</h1>
            <input type="email" id="email" name="email" class="input" placeholder="EMAIL" required>
            <input type="password" id="senha" name="senha" class="input" placeholder="SENHA" required>
            <?php
            if (isset($_SESSION['loginErro'])) {
                echo "<div><spam class='error'>" . $_SESSION["loginErro"] . "</spam></div>";
                unset($_SESSION['loginErro']);
            }
            ?>
            <input type="submit" value="ENTRAR" class="button">
            <p id="vanc">Não possui conta? <a id="ancora" href="cadastro.php">Cadastre-se</a>.</p>
        </form>
    </div>

    <div>
        
    </div>

</body>

</html>