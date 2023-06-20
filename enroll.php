<?php include 'layout.php' ?>

<?php
$con = mysqli_connect("localhost", "username", "password", "database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"];
    $student_code = $_POST["student_code"];
    $query = "INSERT INTO enrolls (Course_ID, Student_Code) VALUES ('$course_id', '$student_code')";
    mysqli_query($con, $query);
}
?>