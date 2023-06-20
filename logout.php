<?php
session_start();
if(isset($_SESSION['Student_Code'])){
    unset($_SESSION['Student_Code']);
}
if(isset($_SESSION['Doctor_Code'])){
    unset($_SESSION['Doctor_Code']);
    header('Location: login_doctor.php');
    die;
}
if(isset($_SESSION['code'])){
    unset($_SESSION['code']);
}
header('Location: login.php');
die;
