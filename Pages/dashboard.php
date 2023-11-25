<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/index.css">
    <style>
        /* Estilos para o dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>CodeCrafters - Seu acervo de receitas</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Receita</a>
                    <div class="dropdown-content">
                        <a href="../Back-End/Receita/listarReceita.php">Receita</a>
                        <a href="../Back-End/Categoria/listarCategoria.php">Categoria</a>
                        <a href="../Back-End/Degustacao/listarDegustacao.php">Degustacao</a>
                        <a href="../Back-End/Medida/listarMedida.php">Medida</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Restaurante</a>
                    <div class="dropdown-content">
                        <a href="../Back-End/Restaurante/listarRestaurante.php">Restaurante</a>
                        <a href="../Back-End/Referencia/listarReferencia.php">Referências</a>
                    </div>
                </li>

                <li><a href="../Back-End/Funcionario/listarFuncionario.php">Funcionários</a></li>
                <li><a href="../Back-End/Cargo/listarCargo.php">Cargo</a></li>
                
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="carousel">
            <div class="slide">
                <img src="imagens/prato1.jpg" alt="Imagem 1">
            </div>
            <div class="slide">
                <img src="imagens/prato2.jpg" alt="Imagem 2">
            </div>
            <div class="slide">
                <img src="imagens/prato3.jpg" alt="Imagem 3">
            </div>
        </div>
        <main>
            <div class="carousel">
                <div class="slide">
                    <img src="../imagens/prato1.jpg" alt="Imagem 1">
                </div>
                <div class="slide">
                    <img src="../imagens/prato2.jpg" alt="Imagem 2">
                </div>
                <div class="slide">
                    <img src="../imagens/prato3.jpg" alt="Imagem 3">
                </div>
            </div>
        </main>
        <section class="carousel2">
            <div class="carousel2-track">
                <div class="slide2">
                    <img src="../imagens/doces.jpg" alt="Imagem 1">
                    <p class="image-name">Doces</p>
                </div>
                <div class="slide2">
                    <img src="../imagens/hamburguer.jpg" alt="Imagem 2">
                    <p class="image-name">Salgados</p>
                </div>
                <div class="slide2">
                    <img src="../imagens/saladas.jpg" alt="Imagem 3">
                    <p class="image-name">Saladas</p>
                </div>
            </div>
        </section>
        <script src="../Pages/js/function.js"></script>
    </body>
    </html>
    
