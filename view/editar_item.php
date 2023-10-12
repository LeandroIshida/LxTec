<h1> Editar item</h1>

<?php

    include('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verificar'])) 
    {
        $id = $_POST['id'];

        if (empty($id)) {
            echo "nao encontrado";
        }

        $sql = $pdo->prepare("SELECT p.nome, l.titulo, i.* FROM item i 
        JOIN produto p ON i.produto_id = p.id
        JOIN lista_compras l ON i.lista_id = l.id WHERE i.id = $id LIMIT 1");

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
        $novoquantidade = ($_POST['quantidade']);

        try {
            $sql = $pdo->prepare("UPDATE item SET quantidade = :novoquantidade  WHERE id = :id");

            $sql->bindParam(':novoquantidade', $novoquantidade);
            $sql->bindParam(':id', $id);

            $sql->execute();

            session_start();
            $_SESSION['alerta'] = "O Item foi editado com sucesso.";

            header("Location: index.php?page=item");
        } catch (Exception $e) {
            echo "Erro" . $e->getMessage();
        }
    }

?>

<form id="editar_item" method="post" action="?page=editar_item">
    <div class="mb-3">
        <label>Produto</label>
        <input type="text" name="nome" id="nome" value="<?php if (isset($row['nome'])) {
            echo $row['nome'];
        } ?>" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label>Lista</label>
        <input type="text" name="titulo" id="titulo" value="<?php if (isset($row['titulo'])) {
            echo $row['titulo'];
        } ?>" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="quantidade" class="form-control" value="<?php if (isset($row['quantidade'])) {
            echo $row['quantidade'];
        } ?>" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-custom" name="editar"
            onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
            onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';">Salvar</button>
    </div>
</form>