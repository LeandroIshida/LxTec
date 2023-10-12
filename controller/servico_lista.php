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

        $titulo = ($_POST['titulo']);

        $sql = $pdo->prepare("INSERT INTO `lista_compras` VALUES (null,?)");
        $sql->execute(array($titulo));

        session_start();
        $_SESSION['alerta'] = "A Lista foi cadastrada com sucesso.";

        header("Location: index.php?page=lista_compras");
    }

    function excluir()
    {
        include('conexao.php');

        $id = addslashes($_POST["id"]);

        try {
            $sql = $pdo->prepare("DELETE FROM lista_compras WHERE id =:id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            header("Location: index.php?page=lista_compras");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

?>