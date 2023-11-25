<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Referência</title>
    
</head>
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
<body>
<?php
session_start();
include_once '../conexao.php';
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cozinheiro = $_POST['cozinheiro'];
    $idRestaurante = $_POST['idRestaurante'];

    // Corrigir o formato da data
    $dt_inicio = DateTime::createFromFormat('d/m/Y', $_POST['dt_inicio']);
    $dt_inicio = $dt_inicio->format('Y-m-d');

    // Se você também estiver recebendo a data de término, faça o mesmo para ela
    $dt_fim = DateTime::createFromFormat('d/m/Y', $_POST['dt_fim']);
    $dt_fim = $dt_fim ? $dt_fim->format('Y-m-d') : null;

    $query_referencia = "INSERT INTO referencia (cozinheiro, idRestaurante, dt_inicio, dt_fim) VALUES (:cozinheiro, :idRestaurante, :dt_inicio, :dt_fim)";
    $cad_referencia = $conn->prepare($query_referencia);
    $cad_referencia->bindParam(':cozinheiro', $cozinheiro);
    $cad_referencia->bindParam(':idRestaurante', $idRestaurante);
    $cad_referencia->bindParam(':dt_inicio', $dt_inicio);
    $cad_referencia->bindParam(':dt_fim', $dt_fim);

    try {
        if ($cad_referencia->execute()) {
            echo "Referência cadastrada com sucesso.";
            header("Location: listarReferencia.php");
            exit();
        } else {
            $errorInfo = $cad_referencia->errorInfo();
            echo "Erro ao cadastrar a referência. Detalhes: " . implode(" - ", is_array($errorInfo) ? $errorInfo() : []);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

    <main>
        <div id="addForm">
            <h2>Cadastrar Referência</h2>
            <form id="referenciaForm" method="post" action="">
                <label for="cozinheiro">Cozinheiro:</label>
                <input type="text" id="cozinheiro" name="cozinheiro" required><br>
                <label for="idRestaurante">ID Restaurante:</label>
                <input type="text" id="idRestaurante" name="idRestaurante" required><br>
                <label for="dt_inicio">Data Início:</label>
                <input type="text" id="dt_inicio" name="dt_inicio" required><br>
                <label for="dt_fim">Data Fim:</label>
                <input type="text" id="dt_fim" name="dt_fim" required><br><br>
                <button type="submit" name="Cadastrar">Salvar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
