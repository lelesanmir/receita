<?php
session_start();
ob_start();

unset($_SESSION['idLogin']);
header("Location: login.php");

$_SESSION['msg'] = "Deslogado com sucesso!";
