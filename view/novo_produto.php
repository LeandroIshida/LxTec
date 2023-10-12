<h2>Cadastre um Produto</h2>

<hr class="border border-custom border-1 opacity-75">

<form action="?page=servico_produto" method="post">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-custom" name="cadastrar"
            onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
            onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';">Cadastrar</button>
    </div>
</form>