<?php
session_start();
include_once '../conexao.php';
ob_start();

if (isset($_POST['idFunc'])) {
    $idFuncionario = $_POST['idFunc'];

    if (isset($_POST['Nome'], $_POST['RG'], $_POST['Cargo'])) {
        $nome = $_POST['Nome'];
        $rg = $_POST['RG'];
        $cargo = $_POST['Cargo'];

        $query = "UPDATE funcionario SET Nome = :nome, RG = :rg, Cargo = :idCargo WHERE idFunc = :id";
        $editar = $conn->prepare($query);
        $editar->bindParam(':nome', $nome);
        $editar->bindParam(':rg', $rg);
        $editar->bindParam(':cargo', $cargo);
        $editar->bindParam(':id', $idFuncionario, PDO::PARAM_INT);
        $editar->execute();

        if ($editar->rowCount() > 0) {
            echo "Funcionário atualizado com sucesso.";
        } else {
            echo "Nenhum funcionário encontrado com o ID fornecido.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Funcionário</title>
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
    <h2>Editar Funcionário</h2>
    <form action="editarFuncionario.php" method="post">
        <label for="idFuncionario">ID do Funcionário:</label><br>
        <input type="text" id="idFuncionario" name="idFuncionario"><br><br>

        <label for="Nome">Novo Nome:</label><br>
        <input type="text" id="Nome" name="Nome"><br><br>

        <label for="RG">Novo RG:</label><br>
        <input type="text" id="RG" name="RG"><br><br>

        <label for="Cargo">Novo Cargo:</label><br>
        <input type="text" id="Cargo" name="Cargo"><br><br>

        <input type="submit" name="Editar" value="Editar Funcionário">
    </form>
</body>

</html>
