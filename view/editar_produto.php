<h1> Editar produto</h1>

<?php

    include('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verificar'])) 
    {
        $id = $_POST['id'];

        if (empty($id)) {
            echo "nao encontrado";
        }

        $sql = $pdo->prepare("SELECT * FROM produto WHERE id = $id LIMIT 1");

        $sql->execute();

        if (($sql) and ($sql->rowCount() != 0)) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);  
        } else {
            echo "nao encontrado";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) 
    {
        $id = $_POST['id'];
        $novonome = ($_POST['nome']);
        
        try {
            $sql = $pdo->prepare("UPDATE produto SET nome = :novonome WHERE id = :id");

            $sql->bindParam(':novonome', $novonome);
            $sql->bindParam(':id', $id);

            $sql->execute();

            session_start();
            $_SESSION['alerta'] = "O Produto foi editado com sucesso.";

            header("Location: index.php?page=produto");
        } catch (Exception $e) {
            echo "Erro" . $e->getMessage();
        }
    }

?>

<form id="editar_produto" method="post" action="?page=editar_produto">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" id="nome" value="<?php if (isset($row['nome'])) {
            echo $row['nome'];
        } ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn btn-custom" name="editar"
            onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
            onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';">Salvar</button>
    </div>
</form>