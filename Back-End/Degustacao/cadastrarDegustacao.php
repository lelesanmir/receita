<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Degustação</title>
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

    <h1>Cadastrar Degustação</h1>

    <?php
    include_once '../conexao.php'; // Certifique-se de incluir o arquivo de conexão

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $nomeReceita = $_POST['nome_receita'];
        $idCozinheiro = $_POST['id_cozinheiro'];
        $dataDegustacao = $_POST['data_degustacao'];
        $notaDegustacao = $_POST['nota_degustacao'];

        // Query de inserção
        $query = "INSERT INTO degustacao (nome, cozinheiro, Data_degustacao, Nota_degustacao) 
                  VALUES (:nome, :cozinheiro, :data_degustacao, :nota_degustacao)";

        // Preparar e executar a query
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome', $nomeReceita);
        $stmt->bindParam(':cozinheiro', $idCozinheiro);
        $stmt->bindParam(':data_degustacao', $dataDegustacao);
        $stmt->bindParam(':nota_degustacao', $notaDegustacao);

        // Se a execução for bem-sucedida, redireciona para a página de listagem
        if ($stmt->execute()) {
            header("Location: listarDegustacao.php");
            exit();
        } else {
            echo "Erro ao cadastrar a degustação.";
        }
    }
    ?>
<main>
        <div id="addForm">
            <form method="POST" action="">
                <label for="nome_receita">Nome da Receita:</label>
                <input type="text" name="nome_receita" required><br>

                <label for="id_cozinheiro">ID do Cozinheiro:</label>
                <input type="text" name="id_cozinheiro" required><br>

                <label for="data_degustacao">Data de Degustação:</label>
                <input type="date" name="data_degustacao" required><br>

                <label for="nota_degustacao">Nota de Degustação:</label>
                <input type="text" name="nota_degustacao" required><br><br>

                <button type="submit">Cadastrar</button>
        </form>
    </div>
</main>
</body>
</html>
