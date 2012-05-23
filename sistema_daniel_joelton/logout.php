<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['logado']);
session_destroy();
Header("Location: login.php");
?>