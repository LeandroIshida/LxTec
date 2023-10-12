<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de compras</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="imagens/1671717375_logo_registrada.png" class="img-fluid"
                    alt="Lxtec" height="40" width="102"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=tabela_produto">Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=tabela_lista">Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=tabela_item">Item</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Listas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=produto">Produtos</a></li>
                            <li><a class="dropdown-item" href="?page=lista_compras">Listas</a></li>
                            <li><a class="dropdown-item" href="?page=item">Itens</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Cadastro</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=novo_produto">Produtos</a></li>
                            <li><a class="dropdown-item" href="?page=novo_item">Itens</a></li>
                            <li><a class="dropdown-item" href="?page=novo_lista">Listas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">

                <?php

                    include("conexao.php");

                    switch (@$_REQUEST["page"]) 
                    {
                        case "novo_produto":
                            include("view/novo_produto.php");
                            break;
                        case "novo_item":
                            include("view/novo_item.php");
                            break;
                        case "novo_lista":
                            include("view/novo_lista.php");
                            break;
                        case "cadastro":
                            include("view/escolha_cadastro.php");
                            break;
                        case "produto":
                            include("model/produto.php");
                            break;
                        case "item":
                            include("model/item.php");
                            break;
                        case "lista_compras":
                            include("model/lista_compras.php");
                            break;
                        case "servico_produto":
                            include("controller/servico_produto.php");
                            break;
                        case "servico_lista":
                            include("controller/servico_lista.php");
                            break;
                        case "servico_item":
                            include("controller/servico_item.php");
                            break;
                        case "tabela_item":
                            include("model/tabela_item.php");
                            break;
                        case "tabela_produto":
                            include("model/tabela_produto.php");
                            break;
                        case "tabela_lista":
                            include("model/tabela_lista.php");
                            break;
                        case "editar_produto":
                            include("view/editar_produto.php");
                            break;
                        case "editar_lista":
                            include("view/editar_lista.php");
                            break;
                        case "editar_item":
                                include("view/editar_item.php");
                                break;        
                        default:

                        echo '<h1>BEM-VINDO!</h1>';
                        echo '<hr class="border border-custom border-1 opacity-75">';
                        echo '<br><br><br><br><br>';

                        echo '<div class="d-grid gap-2 col-6 mx-auto">';
                        echo '<h3>Ver tabela:</h3>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=produto">Produtos</a>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=lista_compras">Listas</a>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=item">Itens</a>';
                        echo '</div><br>';

                        echo '<div class="d-grid gap-2 col-6 mx-auto">';
                        echo '<h3>Fazer cadastro:</h3>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=novo_produto">Produtos</a>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=novo_lista">Listas</a>';
                        echo '<a type="button" class="btn btn-outline-custom" href="?page=novo_item">Itens</a>';
                        echo '</div>';
                    }

                ?>

            </div>
        </div>
    </div>
</body>
</html>