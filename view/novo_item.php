<h2>Cadastre um Item</h2>

<hr class="border border-custom border-1 opacity-75">

<?php

    include("conexao.php");

    $sql_produto = "SELECT id, nome FROM produto ORDER BY nome ASC";
    $res_produto = $pdo->prepare($sql_produto);
    $res_produto->execute();

    $sql_lista = "SELECT id, titulo FROM lista_compras ORDER BY titulo ASC";
    $res_lista = $pdo->prepare($sql_lista);
    $res_lista->execute();

?>

<form action="?page=servico_item" method="post">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Produto</label>
        <select class="form-select" aria-label="Default select example" name="produto_id" required>
            <option selected></option>

            <?php

            while ($row_produto = $res_produto->fetch(PDO::FETCH_ASSOC)) 
            {
                extract($row_produto);
                echo "<option value='$id'>$nome</option>";
            }

            ?>

        </select>
    </div>
    <div class="mb-3">
        <label>Lista</label>
        <select class="form-select" aria-label="Default select example" name="lista_id" required>
            <option selected></option>

            <?php

            while ($row_lista = $res_lista->fetch(PDO::FETCH_ASSOC)) 
            {
                extract($row_lista);
                echo "<option value='$id'>$titulo</option>";
            }

            ?>

        </select>
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="text" name="quantidade" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-custom" name="cadastrar"
            onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
            onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';">Cadastrar</button>
    </div>
</form>