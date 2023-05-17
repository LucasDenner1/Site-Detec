<?php
session_start();
include_once("conector.php");

if(isset ($_POST['contar'])){
    $id_us = $_SESSION['id'];
    // obtenho a data atual
    $data['atual'] = date('Y-m-d H:i:s');

    //diminuir 20 sec
    $data['online'] = strtotime($data['atual'] . "- 1 minutes");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);

    if((isset($_SESSION['visitante'])) AND (!empty($_SESSION['visitante']))){

        $result_up_visitas = "UPDATE visitas SET 
        data_final = '".$data['atual']."'
        WHERE id = '".$_SESSION['visitante']."'";

        $resultado_up_visitas = mysqli_query($conn, $result_up_visitas);
    } else{
        $result_visitas = "INSERT INTO visitas (id, data_inicio, data_final) VALUES ('$id_us', '".$data['atual']."', '".$data['atual']."')";
         $resultado_visitas = mysqli_query($conn, $result_visitas);
        $_SESSION['visitante'] = mysqli_insert_id($conn);
    }
}

    $result_qnt_visitas = "SELECT COUNT(id) as online FROM visitas WHERE data_final >= '".$data['online']."'"; 
    $resultado_qnt_visitas = mysqli_query($conn,$result_qnt_visitas);

    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas); 

    echo $row_qnt_visitas['online'];
?>