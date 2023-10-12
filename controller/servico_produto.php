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

    $nome = ($_POST['nome']);
    $sql = $pdo->prepare("INSERT INTO `produto` VALUES (null,?)");
    $sql->execute(array($nome));

    session_start();
    $_SESSION['alerta'] = "O Produto foi cadastrado com sucesso.";

    header("Location: index.php?page=produto");
  }

  function excluir()
  {
    include('conexao.php');

    $id = addslashes($_POST["id"]);

    try {
      $sql = $pdo->prepare("DELETE FROM produto WHERE id =:id");
      $sql->bindValue(':id', $id);
      $sql->execute();

      header("Location: index.php?page=produto");
    } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

?>