<?php
require 'connect.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id =:id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Editar Veículo</title>
</head>
<!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/config.css" rel="stylesheet">


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">Sobre</h4>
                        <p class="text-muted">Melhor Locadora de Automóveis da Região.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contato</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Siga-me no Instagram</a></li>
                            <li><a href="#" class="text-white">Mande-me um email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189l.956-1.913A.5.5 0 0 1 4.309 3h7.382a.5.5 0 0 1 .447.276l.956 1.913a.51.51 0 0 1-.497.731c-.91-.073-3.35-.17-4.597-.17-1.247 0-3.688.097-4.597.17a.51.51 0 0 1-.497-.731Z" />
                    </svg>
                    <strong>Up - Locação Automotiva</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <main>
        <h2 class="h2">Editar Veículo</h2>

        <form method="POST" action="editar_veiculo.php">

            <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
            <div class="form-group">
                <label>Nome do Veículo</label>
                <input type="text" name="nome" value="<?= $usuario['nome']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" name="modelo" value="<?= $usuario['modelo']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Marca</label>
                <input type="text" name="marca" value="<?= $usuario['marca']; ?>" class="form-control" required>
            </div> <br>
            <div class="form-check">
                <label>Tipo</label><br>
                <input type="radio" name="tipo" value="HATCH" value="<?= $usuario['tipo']; ?>" required> Hatch <br>
                <input type="radio" name="tipo" value="SEDAN" value="<?= $usuario['tipo']; ?>" required> Sedan <br>
                <input type="radio" name="tipo" value="SUV" value="<?= $usuario['tipo']; ?>" required> SUV <br>
            </div>
            <input type="submit" class="btn btn-dark" value="Atualizar">
        </form>

        <div class="position">
            <a class="btn btn-dark" href="lista.php">Voltar</a>
        </div>
    </main>

</body>
<script src="./js/bootstrap.bundle.min.js"></script>

</html>