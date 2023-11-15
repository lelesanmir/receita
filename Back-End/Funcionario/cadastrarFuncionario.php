<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pages/Styles/style.css">
    <title>Lista de Funcionários</title>
    <style>
        /* Estilos */
    </style>
</head>
<header>
    <nav>
        <ul>
            <li><a href="../../Pages/dashboard.php">Home</a></li>
            <li><a href="../../Pages/carg.php">Cargos</a></li>
            <li><a href="../../Pages/func.php">Funcionários</a></li>
            <li><a href="../../Pages/rest.php">Restaurante</a></li>
            <li><a href="../../Pages/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<body>
    <main>
        <div id="addForm">
            <h2>Incluir Funcionário</h2>
            <form action="../../Back-End/cadastro2.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="Nome" require placeholder="Nome">

                <label for="RG">RG</label>
                <input type="text" name="RG" require placeholder="RG">

                <label for="nome">Nome Fantasia</label>
                <input type="text" name="NomeFantasia" require placeholder="NomeFantasia">

                <label for="Data_Inicio">Data Admissão</label>
                <input type="date" name="dataI" require placeholder="Data">

                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" required placeholder="Login">

                <label for="Cargo">Cargo</label>
                <input type="text" name="Cargo" require placeholder="Cargo">

                <label for="Senha">Senha</label>
                <input type="password" name="senha" required placeholder="Senha">

                <label for="Senha">Confirme a Senha</label>
                <input type="password" name="senha" required placeholder="Senha">

                <label for="Salário">Salário</label>
                <input type="text" name="Salario" require placeholder="Salario">

                <input type="submit" value="Enviar" name="sendLogin">

            </form>
        </div>
    </main>

    <footer>
        <p>CodeCrafters© 2023</p>
    </footer>
</body>

</html>