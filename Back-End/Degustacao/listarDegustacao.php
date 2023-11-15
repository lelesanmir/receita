<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Degustação</title>
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
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

    $query = "SELECT * FROM degustacao";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo "<h2>Lista de Degustações</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Descrição</th><th>Ações</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['idDegustacao'] . "</td><td>" . $row['descricao'] . "</td>";
            echo "<td><a href='editarDegustacao.php?idDegustacao=" . $row['idDegustacao'] . "'>Editar</a> | <a href='listarDegustacao.php?id=" . $row['idDegustacao'] . "'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma degustação encontrada.";
    }

    if (isset($_GET['id'])) {
        $idDegustacao = $_GET['id'];

        $query = "DELETE FROM degustacao WHERE idDegustacao = :id";
        $excluir = $conn->prepare($query);
        $excluir->bindParam(':id', $idDegustacao, PDO::PARAM_INT);
        $excluir->execute();

        if ($excluir->rowCount() > 0) {
            header("Location: listarDegustacao.php"); // Redirecionamento automático
            exit; // Certifique-se de sair após o redirecionamento
        } else {
            echo "Nenhuma degustação encontrada com o ID fornecido.";
        }
    }
    ?>
    <br>
    <a href="cadastrarDegustacao.php">
        <h2>+CADASTRAR NOVA DEGUSTAÇÃO</h2>
    </a>

</body>

</html>
