<h2>Lista de produtos</h2>

<hr class="border border-custom border-1 opacity-75">

<?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) 
  {
    $nome = $_POST['nome'];

    $sql = $pdo->prepare("SELECT * FROM produto WHERE nome LIKE :nome");

    $nome = "%" . $nome . "%";
    $sql->bindParam(':nome', $nome);
    $sql->execute();
  } else {
    $sql = $pdo->prepare("SELECT * FROM produto");

    $sql->execute();
  }

?>

<form method="post" action="?page=tabela_produto">
  <div class="box-search mb-3">
    <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar" name="nome">
    <button class="btn btn-custom" name="buscar">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
        viewBox="0 0 16 16">
        <path
          d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
      </svg>
    </button>
  </div>
</form>

<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
    </tr>
  </thead>

  <?php

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

  ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $row['id']; ?>
        </th>
        <td>
          <?php echo $row['nome']; ?>
        </td>
      </tr>
    </tbody>

  <?php

    }

  ?>

</table>