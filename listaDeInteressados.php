<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();

    include_once 'conexao.php';

    $sql = "SELECT * FROM interessados";
    $consulta = $conn->prepare($sql);
    $consulta->execute();
    ?>
</head>
<body><div id="tabela">
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
                <td><input type="button" value="deletar" id="botaoDeleta" onclick="exluiInteressado(<?php echo $linha['emails'];?>)"></td>
            </tr>
       <?php } ?>
    </table></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="funcoes.js"></script>
</html>