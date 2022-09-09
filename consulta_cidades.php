<?php
require_once('conexao.php');
$sql = "SELECT Codigo, Nome FROM `municipio` where Uf = :sigla";
try {
    $consulta = $conn->prepare($sql);
    $cidades = $consulta->execute(array('sigla' => $_GET['estado']));
    while($r = $consulta->fetch()) {
        echo '<option value="'.$r['Codigo'].'">'.$r['Nome'].'</option>';
    } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>