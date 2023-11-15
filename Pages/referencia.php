<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>CodeCrafters - Referências</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="receita.php">Receitas</a></li>
                <li><a href="func.php">Funcionários</a></li>
                <li><a href="carg.php">Cargo</a></li>
                <li><a href="categoria.php">Categoria</a></li>
                <li><a href="rest.php">Restaurante</a></li>              
                <li><a href="degustacao.php">Degustacao</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <body>
        <main>
            <div>
                <label for="pesquisa"><h2><Var>Referências</Var></h2></label> 
                <a href="../Back-end/Referencia/listarReferencia.php" class="search-button"><i class="fas fa-search"></i> Pesquisar</a>            
                <button><a href='../Back-end/Referencia/cadastrarReferencia.php'>Cadastrar Categoria</a></button>           
            </div>
           
    
            <table>
                <thead>
                    <tr>
                        <th>Referências</th>
                        <th>Descrição</th>
                        <th><a href='../Back-end/Referencia/excluirReferencia.php'><i class="fas fa-trash"></i></a></th>
                        <th><a href='../Back-end/Referencia/editarReferencia.php'><i class="fas fa-edit"></i></a></th>
                    </tr>
                </thead>
            </table>
        </main>
    
        <footer>
            <p>CodeCrafters© 2023</p>
        </footer>
</body>
</html>
