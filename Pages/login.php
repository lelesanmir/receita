<?php

include_once "../Back-end/login2.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="login-form" action="../Back-end/login2.php" method="post" >
                <div id="img">
                    <img src="imagens/camera.svg" alt="">
                </div>
                <div>
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="input-with-icon">
                    <span class="icon">&#x1F464;</span>
                    <input type="text" id="username" placeholder="Usuário" name="usuario" required>
                </div>
                <div class="input-with-icon">
                    <span class="icon">&#x1F512;</span>
                    <input type="password" id="password" placeholder="Senha" name="senha" id="" required>
                </div>

                <input type="submit" value="Enviar" name="sendLogin" id="Button" required style="display:none">
                <label for="Button" class="custom-button">Entrar</label>
            </form>
         
        </div>
    </div>
</body>
</html>