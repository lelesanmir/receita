<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Cargo</title>
</head>
<header>
    <nav>
        <ul>
                <li><a href="../../Pages/dashboard.php">Home</a></li>
                <li><a href="../Categoria/listarCategoria.php">Categoria</a></li>
                <li><a href="../Funcionario/listarFunicionario.php">Funcionários</a></li>
                <li><a href="../Restaurante/listarRestaurante.php">Restaurante</a></li>
                <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
    <main>
        <div id="addForm">
            <h2>Cadastrar Cargo</h2>
            <?php
            session_start();
            include_once '../conexao.php';
            ob_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $descricao = $_POST['descricao'];

                $query_cargo = "INSERT INTO cargo (descricao) VALUES (:descricao)";
                $cad_cargo = $conn->prepare($query_cargo);
                $cad_cargo->bindParam(':descricao', $descricao);

                if ($cad_cargo->execute()) {
                    echo "Cargo cadastrado com sucesso.";
                } else {
                    echo "Erro ao cadastrar o cargo.";
                }
            }
            ?>

            <form id="cargoForm" method="post" action="">
                <label for="descricao">Descrição do Cargo:</label>
                <input type="text" id="descricao" name="descricao" required><br>

                <button type="submit" name="Cadastrar">Salvar</button>
                <button><a href="listarCargo.php">Voltar Para Cargo</a></button>
            </form>
        </div>
    </main>
    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>