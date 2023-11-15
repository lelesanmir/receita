<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Restaurante</title>
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
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

    if (isset($_POST['idRestaurante'])) {
        $idRestaurante = $_POST['idRestaurante'];

        // Realize a exclusão no banco de dados
        $query = "DELETE FROM restaurante WHERE idRestaurante = :id";
        $excluir = $conn->prepare($query);
        $excluir->bindParam(':id', $idRestaurante, PDO::PARAM_INT);
        $excluir->execute();

        // Verifique se a exclusão foi bem-sucedida
        if ($excluir->rowCount() > 0) {
            echo "Restaurante excluído com sucesso.";
            header("Location: listarRestaurante.php"); // Redirecionamento automático
            exit; // Certifique-se de sair após o redirecionamento
        } else {
            echo "Nenhum restaurante encontrado com o ID fornecido.";
        }
    }
    ?>

    <h2>Excluir Restaurante</h2>
    <form action="excluirRestaurante.php" method="post">
        <label for="idRestaurante">ID do Restaurante:</label><br>
        <input type="text" id="idRestaurante" name="idRestaurante"><br><br>
        <input type="submit" name="Excluir" value="Excluir Restaurante">
    </form>

</body>

</html>