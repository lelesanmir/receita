<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Restaurante</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../Cargo/listarCargo.php">Cargo</a></li>
            <li><a href="../Funcionario/listarFunicionario.php">Funcionários</a></li>
            <li><a href="../Categoria/listarCategoria.php">Categoria</a></li>
            <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
    <main>
        <div id="addForm">
            <h2>Cadastrar Restaurante</h2>
            <?php
            session_start();
            include_once '../conexao.php';
            ob_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome_rest = $_POST['nome'];
                $contato = $_POST['contato'];

                $query_rest = "INSERT INTO restaurante (nome_rest, contato) VALUES (:nome_rest, :contato)";
                $cad_rest = $conn->prepare($query_rest);
                $cad_rest->bindParam(':nome_rest', $nome_rest);
                $cad_rest->bindParam(':contato', $contato);

                if ($cad_rest->execute()) {
                    echo "Restaurante cadastrado com sucesso.";
                } else {
                    echo "Erro ao cadastrar o restaurante.";
                }
            }
            ?>

            <form id="restForm" method="post" action="">
                <label for="nome">Nome do Restaurante:</label>
                <input type="text" id="nome" name="nome" required><br>

                <label for="contato">Contato (Telefone):</label>
                <input type="tel" id="contato" name="contato" pattern="[0-9]{2}-[0-9]{4,5}-[0-9]{4}" placeholder="Formato: XX-XXXX-XXXX" required><br>

                <button type="submit" name="Cadastrar">Salvar</button><br><br>
                <button><a href="listarRestaurante.php">Voltar Restaruante</a></button>
            </form>
        </div>
    </main>

    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
