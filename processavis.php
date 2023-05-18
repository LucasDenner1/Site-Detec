<?php
session_start();
include_once("conector.php");

if (isset($_POST['contar'])) {
    $id_us = $_SESSION['id'];
    // Obtenho a data atual
    $data['atual'] = date('Y-m-d H:i:s');

    // Diminuir 20 segundos
    $data['online'] = strtotime($data['atual'] . "- 1 minutes");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);

    $result_visitas = "SELECT id FROM visitas WHERE id = '$id_us'";
    $resultado_visitas = mysqli_query($conn, $result_visitas);

    if (mysqli_num_rows($resultado_visitas) > 0) {
        // Já existe um registro com o ID de usuário, então atualize-o
        $result_up_visitas = "UPDATE visitas SET data_final = '" . $data['atual'] . "' WHERE id = '$id_us'";
        $resultado_up_visitas = mysqli_query($conn, $result_up_visitas);
    } else {
        // Não existe um registro com o ID de usuário, então insira um novo
        $result_visitas = "INSERT INTO visitas (id, data_inicio, data_final) VALUES ('$id_us', '" . $data['atual'] . "', '" . $data['atual'] . "')";
        $resultado_visitas = mysqli_query($conn, $result_visitas);
        $_SESSION['visitante'] = mysqli_insert_id($conn);
    }
}

$result_qnt_visitas = "SELECT COUNT(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";
$resultado_qnt_visitas = mysqli_query($conn, $result_qnt_visitas);

$row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);

echo $row_qnt_visitas['online'];
