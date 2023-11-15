<?php
session_start();
include_once '../conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'idDegustacao' está definido
    if (isset($_POST['idDegustacao'])) {
        $idDegustacao = $_POST['idDegustacao'];

        // Consulta SQL para excluir a degustação com base no ID
        $query = "DELETE FROM degustacao WHERE idDegustacao = :id";
        $excluir = $conn->prepare($query);
        $excluir->bindParam(':id', $idDegustacao, PDO::PARAM_INT);
        $excluir->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($excluir->rowCount() > 0) {
            echo "Degustação excluída com sucesso.";
        } else {
            echo "Nenhuma degustação encontrada com o ID fornecido.";
        }
    }
}

// Consulta SQL para obter degustações
$query = "SELECT * FROM degustacao";
$result = $conn->query($query);

// Verifica se há degustações
if ($result->rowCount() > 0) {
    $degustacoes = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $degustacoes = [];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Degustação</title>
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
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
        </ul>
    </nav>
</header>
<body>

<h2>Listar Degustação</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Receita</th>
            <th>Nome do Cozinheiro</th>
            <th>Data de Degustação</th>
            <th>Nota</th>
            <th>Ação</th>
            <!-- Adicione outras colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($degustacoes as $degustacao): ?>
            <tr>
                <td><?= $degustacao['idDegustacao'] ?></td>
                <td><?= $degustacao['nomeReceita'] ?></td>
                <td><?= $degustacao['nomeCozinheiro'] ?></td>
                <td><?= $degustacao['dataDegustacao'] ?></td>
                <td><?= $degustacao['notaDegustacao'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="idDegustacao" value="<?= $degustacao['idDegustacao'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
                <!-- Adicione outras células conforme necessário -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
