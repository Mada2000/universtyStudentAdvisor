<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    $aff_data = check_affairs_login($con);
    
?>
<?php 
$name = $_POST['Doctor_Name'];
$age = $_POST['Age'];
$pass = $_POST['password'];
$code = $_POST['Doctor_Code'];

$query = "INSERT INTO `doctors`(`Doctor_Code`, `Name`, `Age`, `Password_Hash`) VALUES
 ('$code','$name','$age','$pass')";
$stmt = $con->prepare($query);

$stmt->execute();

header('Location: homepage_affairs.php');
exit;

?>