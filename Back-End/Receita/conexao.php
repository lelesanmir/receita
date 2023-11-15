<?php
$host = "localhost";
$user = "root";
$pass = "admin";
$dbName = "livro_receita1";

try{
    $conn = new PDO("mysql:host=localhost;dbname=$dbName", $user, $pass);

    //echo "conectado com o banco de dados";
}catch(PDOException $err){
    echo "não foi possível conectar com o banco de dados" . $err->getMessage();
}


?>