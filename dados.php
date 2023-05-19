<?php
include_once 'conector.php';
session_start();
if (empty($_SESSION['adm'])) {
    print "<script>location.href= 'erro404.php';</script>";
}
$_SESSION["PagOrig"] = "Adm";
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./Home.css">
</head>

<body>

    <?php
    $id_us = $_SESSION['id'];
    // obtenho a data atual
    $data['atual'] = date('Y-m-d H:i:s');

    //diminuir 20 sec
    $data['online'] = strtotime($data['atual'] . "-20 seconds");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);

    $result_qnt_visitas = "SELECT COUNT(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";
    $resultado_qnt_visitas = mysqli_query($conn, $result_qnt_visitas);

    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        setInterval(function() {
            $.post("processavis.php", {
                contar: '',
            }, function(data) {
                $('#online').text(data);
            })
        }, 5000);
    </script>

    <div class="background-image"></div>
    <nav class="container">
        <div class="logo">
            <img src="./imagens/LOGO.png" alt="">
        </div>
        <div class="usuario" onclick="abrirMenu()">
            <img src="./imagens/usuario-p.png" alt="">
            <div id="menu" class="menuUser">
                <?php
                if (!empty($_SESSION['adm'])) {
                ?>
                    <a style="color:#FFFFFF" href="Home.php">Home</a>
                    <a style="color:#FFFFFF" href="Adm.php">Adm</a>
                <?php
                }
                ?>
                <a style="color:#FFFFFF" href="perfil.php">Perfil</a>
                <a style="color:#FFFFFF" href="logout.php">Sair</a>
            </div>
        </div>
    </nav>

    <script>
        function abrirMenu() {
            const menu = document.getElementById("menu")
            let aberto = window.getComputedStyle(menu).getPropertyValue("display")
            if (aberto == "none") {
                menu.style.display = "flex"

            } else {
                menu.style.display = "none"
            }
        }
    </script>

    <div class="introducao">
        <img class="pata" src="./imagens/dados.png">
        <div>
            <h2>Quantidade de usuarios online: <span id='online'>0</span></h2>
        </div>
    </div>


    <?php
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
    $procura = mysqli_query($conn, $sql);

    $linhas = mysqli_fetch_all($procura);

    foreach ($linhas as $linha) {

        //echo "<div>" . $linha["0"] . $linha["1"] . $linha["2"] ."/<div>";
    ?>
        <div id="addPublis">
            <!-- linha [0] é o titulo no banco de dados -->
            <p><?php echo "Nome: " . $linha["1"] ?></p>
            <!-- linha [1] é o texto no banco de dados -->
            <p><?php echo "Email: " . $linha["2"] ?></p>

            <form method="post" action="banido.php">
                <input name="idU" type="hidden" value="<?php echo $linha[0]; ?>">
                <input type="submit" class="banir-botao" value="Banir">
            </form>
        </div>
    <?php
    }
    ?>

</body>

</html>