<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Listar Funcionários</title>
</head>
<header>
    <nav>
        <ul>
        <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../Categoria/listarCategoria.php">Categoria</a></li>
            <li><a href="../Funcionario/listarFuncionario.php">Funcionários</a></li>
            <li><a href="../Restaurante/listarRestaurante.php">Restaurante</a></li>
            <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<body>

    <?php
    session_start();
    include_once '../conexao.php';
    ob_start();

    $query = "SELECT * FROM funcionario";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo "<h2>Lista de Funcionários</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>RG</th><th>Cargo</th><th>Ações</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['idFunc'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['rg'] . "</td><td>" . $row['idCargo'] . "</td>";
            echo "<td><a href='editarFuncionario.php?idFunc=" . $row['idFunc'] . "'>Editar</a> | <a href='excluirFuncionario.php?idFunc=" . $row['idFunc'] . "'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum funcionário encontrado.";
    }
    ?>

    <br>
    <a href="cadastrarFuncionario.php">Cadastrar Novo Funcionário</a>

</body>

</html>
