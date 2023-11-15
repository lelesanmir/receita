<?php
session_start();
include_once 'conexao.php';
ob_start();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(!empty($dados['sendLogin'])){
    var_dump($dados);
    $query_user = "SELECT idLogin, login, senha
                FROM login
                WHERE login =:usuario
                LIMIT 1"; 
                $conn_user = $conn -> prepare($query_user);
                $conn_user-> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                $conn_user-> execute();

                if(($conn_user) AND ($conn_user->rowCount() != 0)){
                    $rowUser = $conn_user->fetch(PDO::FETCH_ASSOC);
                    //var_dump($rowUser);
                    if(password_verify($dados['senha'], $rowUser['senha'])){
                        $_SESSION['idLogin'] = $rowUser['idLogin'];
                        header("Location: ../Pages/dashboard.html");
                      
                    }else{
                        $_SESSION['msg'] = "ERROR: Usuario ou senha invalida!";
                        header("Location: ../Pages/login.php");
                        echo "b";
                    }
                }else{
                    $_SESSION['msg'] = "ERROR: Usuario ou senha invalida!";
                    header("Location: ../Pages/login.php");
                   
                }

                

}


?>