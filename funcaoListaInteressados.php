<?php
    session_start();

    include_once 'conexao.php';

    $sql = "SELECT * FROM interessados";
    $consulta = $conn->prepare($sql);
    $consulta->execute();

?>
<table border=1>
    <tr>
        <td>Nome</td>
        <td>email</td>
        <td>Deletar</td>
    </tr>
    <?php foreach($consulta as $linha){ ?>
        <tr>
            <td><?php echo $linha['nome']?></td>
            <td><?php echo $linha['email']?></td>
            <td><input type="button" value="deletar" id="botaoDeleta" onclick="excluiInteressado('<?php echo $linha['email']?>')"></td>
        </tr>
    <?php } ?>
</table>