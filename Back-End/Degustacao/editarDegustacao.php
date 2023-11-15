<?php
session_start();
include_once '../conexao.php';
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idDegustacao'])) {
    $idDegustacao = $_GET['idDegustacao'];

    $query_obter_degustacao = "SELECT * FROM degustacao WHERE idDegustacao = :idDegustacao";
    $obter_degustacao = $conn->prepare($query_obter_degustacao);
    $obter_degustacao->bindParam(':idDegustacao', $idDegustacao, PDO::PARAM_INT);
    $obter_degustacao->execute();

    if ($obter_degustacao->rowCount() > 0) {
        $degustacao = $obter_degustacao->fetch(PDO::FETCH_ASSOC);
        $descricao = $degustacao['descricao'];
        // Adicione aqui os campos que deseja editar
    } else {
        echo "Degustação não encontrada.";
        // Você pode redirecionar ou lidar com a situação de erro de outra forma
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário e atualize no banco de dados conforme necessário
    // Código para atualizar os dados no banco de dados
    // ...
    header("Location: listarDegustacao.php"); // Redirecionar para a página de listagem após a atualização
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Degustação</title>
</head>
<body>
    <main>
        <div id="editForm">
            <h2>Editar Degustação</h2>
            <form method="post" action="">
                <label for="descricao">Nova Descrição:</label>
                <input type="text" id="descricao" name="descricao" value="<?php echo $descricao; ?>" required><br>
                <!-- Adicione os campos que deseja editar -->
                <input type="submit" value="Editar Degustação">
                <button><a href="listarDegustacao.php">Voltar Para Degustação</a></button>
            </form>
            <!-- Exibir mensagem de sucesso ou erro após a edição -->
            <!-- <?php echo $mensagem; ?> -->
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
