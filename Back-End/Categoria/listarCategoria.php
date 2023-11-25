<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Listar Categoria</title>
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
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir a Categoria com ID: " + id + "?")) {
                fetch('excluirCategoria.php', {
                    method: 'POST',
                    body: new URLSearchParams({ 'idCateg': id }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Categoria excluída com sucesso!');
                        window.location.href = 'listarCategoria.php';
                    } else {
                        alert('Erro ao excluir a Categoria.');
                    }
                })
                .catch(error => console.error('Erro:', error));
            }
        }
    </script>
</head>
<header>
    <nav>
        <ul>
            <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../Cargo/listarCargo.php">Cargo</a></li>
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

    $query = "SELECT * FROM categoria";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo "<h2>Lista de Categorias</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Descrição</th><th>Ações</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['idCateg'] . "</td><td>" . $row['descricao'] . "</td>";
            echo "<td><a href='editarCategoria.php?idCateg=" . $row['idCateg'] . "'>Editar</a> | <a href='#' onclick='confirmarExclusao(" . $row['idCateg'] . ")'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma categoria encontrada.";
    }
?>

<br>
    <a href="cadastrarCategoria.php">
        <h2>+ CADASTRAR NOVA CATEGORIA</h2>
    </a>
</body>

</html>
