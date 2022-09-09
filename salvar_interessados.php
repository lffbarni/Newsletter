<?php
    session_start();

    include_once 'conexao.php';

    function validaEmail(){
        if((filter_var($_POST['iEmail'],FILTER_VALIDATE_EMAIL)) == $_POST['iEmail']){
            return 1;
        }
        else{
            return 0;
        }
    }
    function validaTelefone(){
        if(preg_match("/(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/", $_POST['iFone']) == 1){
            return 1;
        }
        else{
            return 0;
        }
    }
    function validaNome(){
        if($_POST['iNome'] != ""){
            return 1;
        }
        else{
            return 0;
        }
    }
    function validaEstado(){
        $username = 'root';
        $password = '';
        $conn = new PDO('mysql:host=localhost;dbname=interesse', $username, $password);
        $match = 0;
        $sql = "SELECT * FROM estado ORDER BY Id";
        $consulta = $conn->prepare($sql);
        $consulta->execute();

        foreach($consulta as $linha){
            if($_POST['sEstado'] == $linha['Uf']){
                $match += 1;
            }
        }
        if($match == 1){
            return 1;
        }
        else{
            return 0;
        }
    }
    if(validaEmail() == 1 && validaTelefone() == 1 && validaNome() == 1 && validaEstado() == 1){
        $sql = 'INSERT INTO interessados(email, nome, fone, estado, cidade)
        VALUES(:email, :nome, :fone, :estado, :cidade)';
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array("email" => $_POST['iEmail'],
        "nome" => $_POST['iNome'], "fone" => $_POST['iFone'], "estado" => $_POST['sEstado'],
        "cidade" => $_POST['sCidade']));

        echo 'Dados cadastrados com sucesso!';
    }
    else{
        if(validaEmail() == 0){
            echo "E-Mail inválido.";
            echo "<br>";
        }
        if(validaTelefone() == 0){
            echo "Telefone inválido.";
            echo "<br>";
        }
        if(validaNome() == 0){
            echo "Nome inválido.";
            echo "<br>";
        }
        if(validaEstado() == 0){
            echo "Estado inválido.";
            echo "<br>";
        }
    }
?>
