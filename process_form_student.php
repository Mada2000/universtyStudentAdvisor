<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    $aff_data = check_affairs_login($con);
    
?>
<?php 
$name = $_POST['Student_Name'];
$age = $_POST['Age'];
$pass = $_POST['password'];
$year = $_POST['Year'];
$semester = $_POST['Semester'];
$faculty = $_POST['Faculty'];
$department = $_POST['Department'];
$code = $_POST['Student_Code'];

$query = "INSERT INTO `student`(`Student_Code`, `Student_Name`, `Password_Hash`, `Age`, `Year`, `Semester`, `Faculty`, `Department`) VALUES
 ('$code','$name','$pass','$age','$year','$semester','$faculty','$department')";
$stmt = $con->prepare($query);

$stmt->execute();

header('Location: homepage_affairs.php');
exit;

?>