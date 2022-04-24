<?php
session_start();
include_once "App/Http/Middlewares/auth.php";
unset($_SESSION['user']);
setcookie('user',"",time()-1,'/');
header('location:signin.php');