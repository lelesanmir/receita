<?php
session_start();
include_once '../conexao.php';
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idFunc'])) {
    $idFuncionario = $_GET['idFunc'];

    $query = "SELECT * FROM funcionario WHERE idFunc = :idFuncionario";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idFuncionario', $idFuncionario);
    $stmt->execute();
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($funcionario) {
        echo "<p>Você tem certeza que deseja excluir o funcionário '{$funcionario['nome']}'?</p>";
        echo "<a href='excluirFuncionario.php?idFunc={$funcionario['idFunc']}&confirm=true'>Sim, excluir</a> | <a href='listarFuncionarios.php'>Cancelar</a>";

        if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
            $query_delete_funcionario = "DELETE FROM funcionario WHERE idFunc = :idFuncionario";
            $delete_funcionario = $conn->prepare($query_delete_funcionario);
            $delete_funcionario->bindParam(':idFuncionario', $idFuncionario);

            if ($delete_funcionario->execute()) {
                echo "<p>Funcionário excluído com sucesso.</p>";
            } else {
                echo "<p>Erro ao excluir o funcionário.</p>";
            }
        }
    } else {
        echo "Funcionário não encontrado.";
    }
} else {
    echo "ID do Funcionário não especificado.";
}
?>
