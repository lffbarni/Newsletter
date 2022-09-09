<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php
        session_start();

        include_once 'conexao.php';

        function option_estados() {
            $conn = $GLOBALS['conn'];      
            $sql = "SELECT Uf, Nome FROM estado";
            $consulta = $conn->prepare($sql);
            $estados = $consulta->execute();
            while($r = $consulta->fetch()) {
                echo '<option value="'.$r['Uf'].'">'.$r['Nome'].'</option>';
            } 
        }
    ?>
</head>
<body>
    <h1>Interessados - NewsLetter - DEVs-TI</h1>
    <form action="salvar_interessados.php" method="post" id="fInteressados">
        <label for="iNome">Nome:</label>
        <input type="text" id="iNome" name="iNome">
        <br>
        <label for="iEmail">E-Mail:</label>
        <input type="text" id="iEmail" name="iEmail">
        <br>
        <label for="iFone">Telefone:</label>
        <input type="text" id="iFone" name="iFone">
        <br>

        <label for="sEstado">Estado:</label>
        <select id="sEstado" name="sEstado">
            <?php option_estados(); ?>
        </select>
        <br>
        <label for="sCidade">Cidade:</label>
        <select id="sCidade" name="sCidade">
        <?php
                $sql = "SELECT * FROM municipio ORDER BY Id";
                $consulta = $conn->prepare($sql);
                $consulta->execute();

                foreach($consulta as $linha){
                    echo "<option value=\"{$linha['Id']}\">{$linha['Nome']}</option>";
                }
            ?>
        </select>
        <br>
        <input type="reset" id="bLimpar" value="Limpar">&nbsp;|&nbsp;
        <input type="submit" id="bEnviar" value="Enviar" name="enviar">
        <a href="listaDeInteressados.php"><input type="button" value="Lista de Interessados"></a>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="funcoes.js"></script>
</html>

