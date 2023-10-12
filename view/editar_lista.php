<h1> Editar Lista</h1>

<?php

    include('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verificar'])) 
    {
        $id = $_POST['id'];
        
        if (empty($id)) {
            echo "nao encontrado";
        }

        $sql = $pdo->prepare("SELECT * FROM lista_compras WHERE id = $id LIMIT 1");

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
        $novotitulo = ($_POST['titulo']);
        
        try {
            $sql = $pdo->prepare("UPDATE lista_compras SET titulo = :novotitulo WHERE id = :id");

            $sql->bindParam(':novotitulo', $novotitulo);
            $sql->bindParam(':id', $id);

            $sql->execute();

            session_start();
            $_SESSION['alerta'] = "A Lista foi editada com sucesso.";

            header("Location: index.php?page=lista_compras");
        } catch (Exception $e) {
            echo "Erro" . $e->getMessage();
        }
    }

?>

<form id="editar_lista" method="post" action="?page=editar_lista">
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" id="titulo" value="<?php if (isset($row['titulo'])) {
            echo $row['titulo'];
        } ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn btn-custom" name="editar"
            onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
            onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';">Salvar</button>
    </div>
</form>