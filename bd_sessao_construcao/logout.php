<?php
//Iniciando a sessão
session_start();
//destruindo a sessão
unset($_SESSION['login_user']);
unset($_SESSION['logado']);
session_destroy();
 
Header("Location: formulario_login.php");
?>
