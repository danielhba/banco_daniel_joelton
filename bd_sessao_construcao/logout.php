<?php
//Iniciando a sess�o
session_start();
//destruindo a sess�o
unset($_SESSION['login_user']);
unset($_SESSION['logado']);
session_destroy();
 
Header("Location: formulario_login.php");
?>
