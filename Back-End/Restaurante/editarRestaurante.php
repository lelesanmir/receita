<?php
session_start();
include_once '../conexao.php';
ob_start();

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idRestaurante'])) {
    $idRestaurante = $_GET['idRestaurante'];

    $query_obter_restaurante = "SELECT * FROM restaurante WHERE idRestaurante = :idRestaurante";
    $obter_restaurante = $conn->prepare($query_obter_restaurante);
    $obter_restaurante->bindParam(':idRestaurante', $idRestaurante, PDO::PARAM_INT);
    $obter_restaurante->execute();

    if ($obter_restaurante->rowCount() > 0) {
        $restaurante = $obter_restaurante->fetch(PDO::FETCH_ASSOC);
        $nomeRestaurante = $restaurante['nome_rest'];
        $contato = $restaurante['contato'];
    } else {
        echo "Restaurante não encontrado.";
        // Você pode redirecionar ou lidar com a situação de erro de outra forma
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idRestaurante = $_POST['idRestaurante'];
    $nomeRestaurante = filter_input(INPUT_POST, 'nomeRestaurante', FILTER_SANITIZE_STRING);
    $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);

    $query_atualizar_restaurante = "UPDATE restaurante SET nome_rest = :nomeRestaurante, contato = :contato WHERE idRestaurante = :idRestaurante";
    $atualizar_restaurante = $conn->prepare($query_atualizar_restaurante);
    $atualizar_restaurante->bindParam(':nomeRestaurante', $nomeRestaurante);
    $atualizar_restaurante->bindParam(':contato', $contato);
    $atualizar_restaurante->bindParam(':idRestaurante', $idRestaurante);

    if ($atualizar_restaurante->execute()) {
        header("Location: listarRestaurante.php"); // Redirecionar para a página de listagem após a atualização
        exit();
    } else {
        $mensagem = "Erro ao atualizar o restaurante.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Restaurante</title>
</head>
<body>
    <main>
        <div id="editForm">
            <h2>Editar Restaurante</h2>
            <form method="post" action="">
                <label for="nomeRestaurante">Novo Nome do Restaurante:</label>
                <input type="text" id="nomeRestaurante" name="nomeRestaurante" value="<?php echo $nomeRestaurante; ?>" required><br>
                <label for="contato">Novo Contato:</label>
                <input type="text" id="contato" name="contato" value="<?php echo $contato; ?>" required><br>
                <input type="hidden" id="idRestaurante" name="idRestaurante" value="<?php echo $idRestaurante; ?>">
                <input type="submit" value="Editar Restaurante">
                <button><a href="listarRestaurante.php">Voltar Para Restaurante</a></button>
            </form>
            <?php echo $mensagem; ?>
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
