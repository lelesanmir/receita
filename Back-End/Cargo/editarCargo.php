<?php
session_start();
include_once '../conexao.php';
ob_start();

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idCargo = $_GET['id'];

    $query_obter_cargo = "SELECT * FROM cargo WHERE idCargo = :idCargo";
    $obter_cargo = $conn->prepare($query_obter_cargo);
    $obter_cargo->bindParam(':idCargo', $idCargo, PDO::PARAM_INT);
    $obter_cargo->execute();

    if ($obter_cargo->rowCount() > 0) {
        $cargo = $obter_cargo->fetch(PDO::FETCH_ASSOC);
        $descricao = $cargo['descricao'];
    } else {
        echo "Cargo não encontrado.";
        // Você pode redirecionar ou lidar com a situação de erro de outra forma
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCargo = $_POST['idCargo'];
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

    $query_update_cargo = "UPDATE cargo SET descricao = :descricao WHERE idCargo = :idCargo";
    $update_cargo = $conn->prepare($query_update_cargo);
    $update_cargo->bindParam(':descricao', $descricao);
    $update_cargo->bindParam(':idCargo', $idCargo);

    if ($update_cargo->execute()) {
        header("Location: listarCargo.php"); // Redirecionar para a página de listagem após a atualização
        exit();
    } else {
        $mensagem = "Erro ao atualizar o cargo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Cargo</title>
</head>
<body>
    <main>
        <div id="editForm">
            <h2>Editar Cargo</h2>
            <form method="post" action="">
                <label for="descricao">Nova Descrição:</label>
                <input type="text" id="descricao" name="descricao" value="<?php echo $descricao; ?>" required><br>
                <input type="hidden" id="idCargo" name="idCargo" value="<?php echo $idCargo; ?>">
                <input type="submit" value="Editar Cargo">
                <button><a href="listarCargo.php">Voltar Para Cargo</a></button>
            </form>
            <?php echo $mensagem; ?>
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
