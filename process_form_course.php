<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    $aff_data = check_affairs_login($con);
    
?>
<?php 
$id = $_POST['id'];
$doc_code = $_POST['doc_code'];
$num = $_POST['num'];
$pre = $_POST['pre'];
$name = $_POST['name'];

$query = "INSERT INTO `courses`(`Course_ID`, `Doctor_Code`, `Course_Name`, `Num`, `Pre`) VALUES 
 ('$id','$doc_code','$name','$num','$pre')";
$stmt = $con->prepare($query);

$stmt->execute();

header('Location: homepage_affairs.php');
exit;

?>