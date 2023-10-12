<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        if (isset($_POST['cadastrar'])) {
            cadastrar();
        }
        if (isset($_POST['excluir'])) {
            excluir();
        }
    }

    function cadastrar()
    {
        include('conexao.php');

        $lista = ($_POST['lista_id']);
        $produto = ($_POST['produto_id']);
        $quantidade = ($_POST['quantidade']);

        $sql = $pdo->prepare("INSERT INTO `item` VALUES (null,?,?,?)");
        $sql->execute(array($lista, $produto, $quantidade));

        session_start();
        $_SESSION['alerta'] = "O Item foi cadastrado com sucesso.";

        header("Location: index.php?page=item");
    }

    function excluir()
    {
        include('conexao.php');

        $id = addslashes($_POST["id"]);

        try {
            $sql = $pdo->prepare("DELETE FROM item WHERE id =:id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            header("Location: index.php?page=item");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

?>