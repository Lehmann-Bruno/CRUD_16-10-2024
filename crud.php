<?php

    // Pegar o que foi digitado nos inputs

    $id = $_POST["id"];
    $nome = $_POST["nome"];

    /*
    echo("
        <b>$id</b>
        <br>
        $nome
    ");
    */

    include("conecta.php");
    if ((isset($_POST["inserir"])) && $nome != NULL && $id != NULL){
        $comando = $pdo->prepare("INSERT INTO produtos VALUES($id, '$nome')");
        $resultado = $comando->execute();
        echo("
            <script>
                alert('Dados gravados')
                window.location.href='index.html'
            </script>
        ");
    }

    if (isset($_POST["deletar"]) && $id != NULL){
        $comando = $pdo->prepare("DELETE FROM produtos WHERE ID=$id");
        $resultado = $comando->execute();
        echo("
            <script>
                alert('Dados excluidos')
                window.location.href='index.html'
            </script>
        ");
    }

    if (isset($_POST["editar"]) && $id != NULL){
        $comando = $pdo->prepare("UPDATE produtos SET nome='$nome' WHERE ID=$id");
        $resultado = $comando->execute();
        echo("
            <script>
                alert('Dados editados')
                window.location.href='index.html'
            </script>
        ");
    }
    

    if (isset($_POST["listar"])){
        $comando = $pdo->prepare("SELECT * FROM produtos");
        $resultado = $comando->execute();
        while($linha = $comando->fetch()){
            $id = $linha["ID"];
            $nome = $linha["Nome"];

            echo("
                $id = $nome <br><br>
            ");
        }
    }
    
?>