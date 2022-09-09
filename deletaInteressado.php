<?php
    include_once "conexao.php";

    $sql="DELETE FROM interessados WHERE email = {$_POST['email']}";
    $consulta = $conn->prepare($sql);
    $consulta->execute();
?>