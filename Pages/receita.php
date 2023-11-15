<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/style.css">
    <title>Lista de Receitas</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="carg.php">Cargos</a></li>
            <li><a href="func.php">Funcionários</a></li>
            <li><a href="rest.php">Restaurante</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
    <main>
        <div>
            <form method="post" action="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Nome da receita" required><br><br>

                <!-- Adicione mais campos conforme necessário para outros atributos da receita -->

                <button type="submit" name="submit">Incluir Receita</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $nome = $_POST['nome'];

            // Estabeleça a conexão com o banco de dados
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=livro_receita1', 'root', 'admin');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro com banco de dados: " . $e->getMessage();
            }

            // Crie a classe ReceitaCRUD
            class ReceitaCRUD
            {
                private $conn;

                public function __construct($db)
                {
                    $this->conn = $db;
                }

                public function adicionarReceita($nome)
                {
                    $query = "INSERT INTO receita (nome) VALUES (?)";
                    $stmt = $this->conn->prepare($query);
                    return $stmt->execute([$nome]);
                }
            }

            // Crie uma instância da classe ReceitaCRUD e adicione a receita
            $receitaCRUD = new ReceitaCRUD($pdo);
            $receitaCRUD->adicionarReceita($nome);
        }
        ?>

    </main>

    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
