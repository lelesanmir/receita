<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Listar Cargos</title>
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
            width: 15%; /* Defina a largura desejada para o ID aqui */
        }

        th:nth-child(2), td:nth-child(2) {
            width: 50%; /* Largura para a coluna Descrição */
        }

        th:nth-child(3), td:nth-child(3) {
            width: 35%; /* Largura para a coluna Ações */
        }
    </style>
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir o Cargo com ID: " + id + "?")) {
                fetch('excluirCargo.php', {
                    method: 'POST',
                    body: new URLSearchParams({ 'idCargo': id }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Cargo excluído com sucesso!');
                        window.location.href = 'listarCargo.php';
                    } else {
                        alert('Erro ao excluir o Cargo.');
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

    $query_listar_cargos = "SELECT * FROM cargo";
    $listar_cargos = $conn->query($query_listar_cargos);

    if ($listar_cargos->rowCount() > 0) {
        echo "<h2>Listar Cargos</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Descrição</th><th>Ações</th></tr>";
        while ($cargo = $listar_cargos->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$cargo['idCargo']}</td><td>{$cargo['descricao']}</td>";
            echo "<td><a href='editarCargo.php?id={$cargo['idCargo']}'>Editar</a> | <a href='#' onclick='confirmarExclusao({$cargo['idCargo']})'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum cargo cadastrado.";
    }
    ?>
    <br>
    <a href="cadastrarCargo.php">
        <h2>+ CADASTRAR NOVO CARGO</h2>
    </a>
</body>
</html>
