<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Lista de Funcionários</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="carg.php">Cargos</a></li>
            <li><a href="rest.php">Restaurante</a></li>
            <li><a href="receita.php">Receita</a></li>
            <li><a href="login.php">Login</a></li>
            
        </ul>
    </nav>
</header>
<body>
    <main>
        <div>
        <label for="pesquisa">Lista de Funcionários:</label> 
            <a href="../Back-end/Funcionario/listarFuncionario.php" class="search-button"><i class="fas fa-search"></i> Pesquisar</a>            
            <button><a href='../Back-End/Funcionario/cadastrarFuncionario.php'>Incluir Funcionário</a></button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data de Admissão</th>
                    <th>Salário</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </main>

    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
