<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Cadastrar Categoria</title>
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

    <?php
    session_start();
    include_once '../conexao.php';
    ob_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $descricao = trim($_POST['descricao']);

        if (!empty($descricao)) {
            // Verifica se a categoria já existe
            $query_verifica = "SELECT COUNT(*) AS total FROM categoria WHERE descricao = :descricao";
            $verifica_categoria = $conn->prepare($query_verifica);
            $verifica_categoria->bindParam(':descricao', $descricao);
            $verifica_categoria->execute();
            $result = $verifica_categoria->fetch(PDO::FETCH_ASSOC);

            if ($result['total'] > 0) {
                echo "Esta categoria já existe.";
            } else {
                // Insere a categoria no banco de dados
                $query_categoria = "INSERT INTO categoria (descricao) VALUES (:descricao)";
                $cad_categoria = $conn->prepare($query_categoria);
                $cad_categoria->bindParam(':descricao', $descricao);

                if ($cad_categoria->execute()) {
                    echo "Categoria cadastrada com sucesso.";
                } else {
                    echo "Erro ao cadastrar a categoria.";
                }
            }
        } else {
            echo "Por favor, preencha a descrição da categoria.";
        }
    }
    ?>

    <h1>Cadastrar Categoria</h1>

    <form name="cad-categoria" action="" method="post">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição da Categoria"><br><br>
        <input type="submit" value="Cadastrar"><br><br>
        <button><a href="listarCategoria.php">Voltar Categoria</a></button>
    </form>
</body>
</html>
