<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="receita2.php" method="post">
        <?php
            session_start();
            ob_start();

            if(isset($_SESSION['img'])){
                echo '<p>'.$_SESSION["img"].'</p>';
                unset($_SESSION['img']);
            }

            
        ?>
        <input type="text" name="Nome" require placeholder="Nome">
        <input type="text" name="Categoria" require placeholder="Categoria">
        <input type="text" name="MP" require placeholder="Modo de preparo">
        <input type="date" name="dataI" require placeholder="Data">
        <input type="text" name="porcao" required placeholder="porção">
        <input type="text" name="inedita" required placeholder="inedita">
        <input type="file" name="img" required placeholder="img">
        <input type="text" name="Sabores" require placeholder="Sabores">
        
        <input type="submit" value="Enviar" name="sendLogin">

    </form>
</body>
</html>