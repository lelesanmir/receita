<?php
session_start();
include_once '../conexao.php';

// Verifica se o método da requisição é GET e se foi enviado um ID válido na URL
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['idCateg'])) {
    $idCategoria = $_GET['idCateg'];

    // Consulta para obter os dados da categoria com base no ID fornecido
    $query = "SELECT * FROM categoria WHERE idCateg = :idCategoria";
    $consulta = $conn->prepare($query);
    $consulta->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
    $consulta->execute();

    // Verifica se a consulta retornou resultados
    if ($consulta->rowCount() > 0) {
        // Recupera os dados da categoria
        $categoria = $consulta->fetch(PDO::FETCH_ASSOC);

        // Exemplo de preenchimento do formulário com os dados recuperados
        $descricao = $categoria['descricao'];
    } else {
        echo "Categoria não encontrada.";
        // Aqui você pode redirecionar para outra página ou lidar com a situação de erro de outra forma
    }
}

// Verifica se o formulário foi submetido para atualização da categoria
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['atualizar'])) {
    // Recupera os dados do formulário
    $idCategoria = $_POST['idCategoria'];
    $descricaoAtualizada = $_POST['descricao'];

    // Atualiza a categoria no banco de dados
    $queryAtualizar = "UPDATE categoria SET descricao = :descricao WHERE idCateg = :idCategoria";
    $atualizar = $conn->prepare($queryAtualizar);
    $atualizar->bindParam(':descricao', $descricaoAtualizada);
    $atualizar->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
    $atualizar->execute();

    // Verifica se a atualização foi bem-sucedida
    if ($atualizar->rowCount() > 0) {
        echo "Categoria atualizada com sucesso.";
        header("Location: listarCategoria.php"); // Redireciona para a página listarCategoria.php
        exit(); // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao atualizar a categoria.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Categoria</title>
</head>
<header>
    <nav>
        <ul>
        <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../Cargo/listarCargo.php">Cargo</a></li>
            <li><a href="../Funcionario/listarFunicionario.php">Funcionários</a></li>
            <li><a href="../Restaurante/listarRestaurante.php">Restaurante</a></li>
            <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>

<!-- Seu formulário para editar a categoria -->
<form action="" method="post">
    <input type="hidden" name="idCategoria" value="<?php echo $idCategoria; ?>">
    <label for="descricao">Descrição: </label>
    <input type="text" name="descricao" id="descricao" value="<?php echo $descricao; ?>"><br><br>
    <input type="submit" value="Atualizar" name="atualizar">
</form>

</body>
</html>
