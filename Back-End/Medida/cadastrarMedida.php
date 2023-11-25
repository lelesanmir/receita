<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Medida</title>
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
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];

                $query_medida = "INSERT INTO tabela_medida (nome, descricao) VALUES (:nome, :descricao)";
                $cad_medida = $conn->prepare($query_medida_ingrediente);
                $cad_medida->bindParam(':nome', $nome);
                $cad_medida->bindParam(':descricao', $descricao);

                if ($cad_medida->execute()) {
                    echo "Medida cadastrada com sucesso.";
                } else {
                    echo "Erro ao cadastrar a medida.";
                }
            }
            ?>
    <main>
        <div id="addForm">
            <h2>Cadastrar Medida</h2>
            <form id="medidaForm" method="post" action="">
                <label for="nome">Medida:</label>
                <input type="text" id="nome" name="nome" required><br>

                <label for="descricao">Descrição da Medida:</label>
                <textarea id="descricao" name="descricao" cols="30" rows="10" required></textarea><br><br>

                <button type="submit" name="Cadastrar">Salvar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>

</html>