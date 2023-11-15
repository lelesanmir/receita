<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Restaurante</title>
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir o Restaurante com ID: " + id + "?")) {
                fetch('excluirRestaurante.php', {
                    method: 'POST',
                    body: new URLSearchParams({ 'idRestaurante': id }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Restaurante excluído com sucesso!');
                        window.location.href = 'listarRestaurante.php';
                    } else {
                        alert('Erro ao excluir o Restaurante.');
                    }
                })
                .catch(error => console.error('Erro:', error));
            }
        }
    </script>
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="../../Pages/dashboard.php">Home</a></li>
                <li><a href="../Cargo/listarCargo.php">Cargos</a></li>
                <li><a href="../Funcionario/listarFuncionario.php">Funcionários</a></li>
                <li><a href="../Categoria/listarCategoria.php">Categoria</a></li>
                <li><a href="../../Pages/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <?php
    session_start();
    include_once '../conexao.php';
    ob_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idRestaurante'])) {
        $idRestaurante = $_GET['idRestaurante'];

        if (isset($_GET['confirm']) && $_GET['confirm'] == "true") {
            // Processar exclusão
            $query = "DELETE FROM restaurante WHERE idRestaurante = :id";
            $excluir = $conn->prepare($query);
            $excluir->bindParam(':id', $idRestaurante, PDO::PARAM_INT);
            $excluir->execute();

            // Verificar se a exclusão foi bem-sucedida
            if ($excluir->rowCount() > 0) {
                header("Location: listarRestaurante.php"); // Redirecionar para a página de listagem após a exclusão
                exit();
            }
        } else {
            echo "<script>
                    if (confirm('Tem certeza que deseja excluir o Restaurante com ID: $idRestaurante?')) {
                        window.location.href = 'listarRestaurante.php?idRestaurante=$idRestaurante&confirm=true'; // Confirmado, redireciona para excluir
                    } else {
                        window.location.href = 'listarRestaurante.php'; // Cancelado, redireciona de volta para a página de listagem
                    }
                </script>";
        }
    }

    $query = "SELECT * FROM restaurante";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Contato</th><th>Ações</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['idRestaurante'] . "</td><td>" . $row['nome_rest'] . "</td><td>" . $row['contato'] . "</td>";
            echo "<td><a href='editarRestaurante.php?idRestaurante=" . $row['idRestaurante'] . "'>Editar</a> | <a href='#' onclick='confirmarExclusao(" . $row['idRestaurante'] . ")'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum restaurante encontrado.";
    }
    ?>

    <br>
    <a href="cadastrarRestaurante.php">
        <h2>+CADASTRAR NOVO RESTAURANTE</h2>
    </a>

</body>

</html>
