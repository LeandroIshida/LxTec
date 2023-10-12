<h2>Lista de compras</h2>

<hr class="border border-custom border-1 opacity-75">

<?php

  session_start();

  if (isset($_SESSION['alerta'])) 
  {
    $mensagemAlerta = $_SESSION['alerta'];
    echo '<script>alert("' . $mensagemAlerta . '");</script>';
    unset($_SESSION['alerta']);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) 
  {
    $titulo = $_POST['titulo'];

    $sql = $pdo->prepare("SELECT * FROM lista_compras WHERE titulo LIKE :titulo ORDER BY id ASC");

    $titulo = "%" . $titulo . "%";
    $sql->bindParam(':titulo', $titulo);
    $sql->execute();
  } else {
    $sql = $pdo->prepare("SELECT * FROM lista_compras ORDER BY id ASC");

    $sql->execute();
  }

?>

<form method="post" action="?page=lista_compras">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="box-search col-lg-3">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar" name="titulo">
          <button class="btn btn-custom" name="buscar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
              viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </div>
      </div>
      <a href="?page=novo_lista">
        <button type="button" class="btn btn-custom">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus"
            viewBox="0 0 16 16">
            <path
              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg>
        </button>
      </a>
    </div>
  </div>
</form>

<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Título</th>
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
          <?php echo $row['titulo']; ?>
        </td>
        <td>
          <form method="post" action="?page=editar_lista">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button class="transparente" type="submit" name="verificar">
              <i class="fas fa-edit fa-lg icon-custom"></i>
            </button>
          </form>
        </td>
        <td>
          <form method="post" action="?page=servico_lista">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button class="transparente" type="submit" name="excluir"
              onclick="return confirm('Tem certeza de que deseja excluir esta lista?')">
              <i class="fas fa-trash fa-lg icon-custom"></i>
            </button>
          </form>
        </td>
      </tr>
    </tbody>

  <?php

    }

  ?>

</table>