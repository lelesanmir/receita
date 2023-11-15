<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Editar Referência</title>
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

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cozinheiro']) && isset($_GET['idRestaurante'])) {
        $cozinheiro = $_GET['cozinheiro'];
        $idRestaurante = $_GET['idRestaurante'];

        // Buscar os detalhes da referência pelo cozinheiro e ID do Restaurante
        $query = "SELECT * FROM referencia WHERE cozinheiro = :cozinheiro AND idRestaurante = :idRestaurante";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':cozinheiro', $cozinheiro);
        $stmt->bindParam(':idRestaurante', $idRestaurante);
        $stmt->execute();
        $referencia = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($referencia) { ?>
            <form method="post" action="">
                <input type="hidden" name="cozinheiro" value="<?php echo $referencia['cozinheiro']; ?>">
                <input type="hidden" name="idRestaurante" value="<?php echo $referencia['idRestaurante']; ?>">
                <label for="dt_inicio">Nova Data Início:</label>
                <input type="date" id="dt_inicio" name="dt_inicio" value="<?php echo $referencia['dt_inicio']; ?>" required><br>
                <label for="dt_fim">Nova Data Fim:</label>
                <input type="date" id="dt_fim" name="dt_fim" value="<?php echo $referencia['dt_fim']; ?>" required><br>
                <button type="submit" name="Editar">Salvar</button>
            </form>
    <?php } else {
            echo "Nenhuma referência encontrada com o cozinheiro e ID do Restaurante fornecidos.";
        }
    } else {
        echo "Cozinheiro ou ID do Restaurante não especificados.";
    }
    ?>

</body>

</html>