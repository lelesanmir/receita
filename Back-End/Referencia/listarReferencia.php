<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        /* Definindo largura para as colunas */
        th:nth-child(1), td:nth-child(1) {
            width: 10%; /* Defina a largura desejada para o ID aqui */
        }

        th:nth-child(2), td:nth-child(2) {
            width: 60%; /* Largura para a coluna Descrição */
        }

        th:nth-child(3), td:nth-child(3) {
            width: 30%; /* Largura para a coluna Ações */
        }
    </style>
    <title>Lista de Referências</title>

</head>

<body>

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

    <?php
    session_start();
    include_once '../conexao.php';
    ob_start();

    $query = "SELECT * FROM referencia";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo "<h2>Lista de Referências</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Cozinheiro</th><th>ID do Restaurante</th><th>Data de Início</th><th>Data de Fim</th><th>Ações</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['cozinheiro'] . "</td><td>" . $row['idRestaurante'] . "</td><td>" . $row['dt_inicio'] . "</td><td>" . $row['dt_fim'] . "</td>";
            echo "<td><a href='editarReferencia.php?cozinheiro=" . $row['cozinheiro'] . "&idRestaurante=" . $row['idRestaurante'] . "'>Editar</a> | <a href='excluirReferencia.php?cozinheiro=" . $row['cozinheiro'] . "&idRestaurante=" . $row['idRestaurante'] . "'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma referência encontrada.";
    }
    ?>

    <br>
    <a href="cadastrarReferencia.php">
        <h2>Cadastrar Nova Referência</h2>
    </a>

</body>

</html>