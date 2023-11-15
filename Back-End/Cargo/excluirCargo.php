<?php
session_start();
include_once '../conexao.php';
ob_start();

if (isset($_POST['idCargo'])) {
    $idCargo = $_POST['idCargo'];

    $query = "DELETE FROM cargo WHERE idCargo = :id";
    $excluir = $conn->prepare($query);
    $excluir->bindParam(':id', $idCargo, PDO::PARAM_INT);
    $excluir->execute();

    if ($excluir->rowCount() > 0) {
        echo "Cargo excluído com sucesso.";
        // Redirecionar para listarCargo.php após excluir
        header("Location: listarCargo.php");
        exit();
    } else {
        echo "Nenhum cargo encontrado com o ID fornecido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Excluir Cargo</title>
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

<h2>Excluir Cargo</h2>
<form action="excluirCargo.php" method="post">
    <label for="idCargo">ID do Cargo:</label><br>
    <input type="text" id="idCargo" name="idCargo"><br><br>
    <input type="submit" name="Excluir" value="Excluir Cargo">
    <button><a href="listarCargo.php">Voltar Para Cargo</a></button>
</form>

</body>
</html>
