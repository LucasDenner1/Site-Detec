<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <!-- divisão -->
    <div class="container">
        <!-- cria formulário, coloca o id do css, a forma de envio é post, enviando as informações para inserir.php -->
        <form id="cadastro-form" method="post" action="inserir.php">
            <!-- Titulo do formulário -->
            <h1 id="titulo">CADASTRO</h1>
            <input type="text" id="nome" name="nome" class="input" placeholder="Nome" required>
            <input type="email" id="email" name="email" class="input" placeholder="Email" required>
            <input type="password" id="senha" name="senha" class="input" placeholder="Senha" required>
            <input type="password" id="confirmar_senha" name="confirmarsenha" class="input" placeholder="Confirmar Senha" required>
            <input type="submit" value="Cadastrar" class="button">

           

        </form>
    </div>
</body>
</html>