<?php
session_start();
unset($_SESSION['Logged_In']);
unset($_SESSION['AccountUserType']);
session_destroy();
// header("Location:/BRGYIT-UI/sign-in.php"); //Development Build
header("Location:sign-in.php"); //Testing And Deployment Build
?>