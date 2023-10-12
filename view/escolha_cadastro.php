<h1>Escolha o que deseja cadastrar</h1>

<hr class="border border-custom border-1 opacity-75">

<div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-custom" href="?page=novo_lista"
        onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
        onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';" role="button">Lista</a>
    <a class="btn btn-custom" href="?page=novo_produto"
        onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
        onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';" role="button">Produto</a>
    <a class="btn btn-custom" href="?page=novo_item"
        onmousedown="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';"
        onmouseup="this.style.backgroundColor='#2e506a'; this.style.borderColor='#2e506a';" role="button">Item</a>
</div>
<div class="container">
    <div class="row">
        <div class="col mt-5">

            <?php

            switch (@$_REQUEST["page"]) {
                case "novo_produto":
                    include("novo_produto.php");
                    break;
                case "novo_item":
                    include("novo_item.php");
                    break;
                case "novo_lista":
                    include("novo_lista.php");
                    break;
            }

            ?>

        </div>
    </div>
</div>