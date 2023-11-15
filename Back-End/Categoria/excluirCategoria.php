<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Excluir Categoria</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../../Pages/carg.php">Cargos</a></li>
            <li><a href="../../Pages/func.php">Funcionários</a></li>
            <li><a href="../../Pages/rest.php">Restaurante</a></li>
            <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<body>

    <?php
    session_start();
    include_once '../conexao.php';
    ob_start();

    if (isset($_POST['idCateg'])) {
        $idCateg = $_POST['idCateg'];

        $query = "DELETE FROM categoria WHERE idCateg = :id";
        $excluir = $conn->prepare($query);
        $excluir->bindParam(':id', $idCateg, PDO::PARAM_INT);
        $excluir->execute();

        if ($excluir->rowCount() > 0) {
            echo "Categoria excluída com sucesso.";
            header("Location: listarCategoria.php"); // Redirecionamento automático
            exit; // Certifique-se de sair após o redirecionamento
        } else {
            echo "Nenhuma categoria encontrada com o ID fornecido.";
        }
    }
    ?>

    <h2>Excluir Categoria</h2>
    <form action="excluirCategoria.php" method="post">
        <label for="idCateg">ID da Categoria:</label><br>
        <input type="text" id="idCateg" name="idCateg"><br><br>
        <input type="submit" name="Excluir" value="Excluir Categoria">
    </form>

    <a href="listarCategoria.php">Voltar para a Lista de Categorias</a>

</body>

</html>