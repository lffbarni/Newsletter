<?php

    include_once "conexao.php";

    $sql = "SELECT * FROM interessados";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
?>
<table>
    <?php
        foreach($consulta as $linha){ ?>
            <tr>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['email'];?></td>
                <td><?php echo $linha['fone'];?></td>
                <td><?php echo "<a href=\"deleta.php?email={$linha['email']}\"><input type=\"button\" value=\"D\"</a>" ?></td>
            </tr>

            <?php
        }
    ?>
</table>