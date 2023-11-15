<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Excluir Referência</title>
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

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o campo 'cozinheiro' e 'idRestaurante' estão definidos
        if (isset($_POST['cozinheiro']) && isset($_POST['idRestaurante'])) {
            $cozinheiro = $_POST['cozinheiro'];
            $idRestaurante = $_POST['idRestaurante'];

            // Consulta SQL para excluir a referência com base no cozinheiro e ID do Restaurante
            $query = "DELETE FROM referencia WHERE cozinheiro = :cozinheiro AND idRestaurante = :idRestaurante";
            $excluir = $conn->prepare($query);
            $excluir->bindParam(':cozinheiro', $cozinheiro);
            $excluir->bindParam(':idRestaurante', $idRestaurante);
            $excluir->execute();

            // Verifica se a exclusão foi bem-sucedida
            if ($excluir->rowCount() > 0) {
                echo "Referência excluída com sucesso.";
                header("Location: listarReferencia.php"); // Redirecionamento automático
                exit; // Certifique-se de sair após o redirecionamento
            } else {
                echo "Nenhuma referência encontrada com o cozinheiro e ID do Restaurante fornecidos.";
            }
        }
    }

    ?>

    <h2>Excluir Referência</h2>
    <form action="excluirReferencia.php" method="post">
        <label for="cozinheiro">Cozinheiro:</label><br>
        <input type="text" id="cozinheiro" name="cozinheiro" required><br><br>
        <label for="idRestaurante">ID do Restaurante:</label><br>
        <input type="text" id="idRestaurante" name="idRestaurante" required><br><br>
        <input type="submit" name="Excluir" value="Excluir Referência">
    </form>

</body>

</html>