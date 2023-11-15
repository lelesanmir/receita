<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Lista de Restaurantes</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="carg.php">Cargos</a></li>
            <li><a href="categoria.php">Categoria</a></li>
            <li><a href="func.php">Funcionários</a></li>
            <li><a href="receita.php">Receita</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>
    <main>
        <div>
            <label for="pesquisa">Lista de Restaurantes:</label> 
            <a href="../Back-end/Restaurante/listarRestaurante.php" class="search-button"><i class="fas fa-search"></i> Pesquisar</a>            
            <button><a href='../Back-end/Restaurante/cadastrarRestaurante.php'>Cadastrar Restaurante</a></button>           
        </div>
       

        <table>
            <thead>
                <tr>
                    <th>Restaurante</th>
                    <th>Nome Fantasia</th>
                    <th>Contato</th>
                    <th><a href='../Back-end/Restaurante/excluirRestaurante.php'><i class="fas fa-trash"></i></a></th>
                    <th><a href='../Back-end/Restaurante/editarRestaurante.php'><i class="fas fa-edit"></i></a></th>
                </tr>
            </thead>
        </table>
    </main>

    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>
</html>
