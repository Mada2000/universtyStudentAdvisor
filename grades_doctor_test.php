<?php include 'layout_doctor.php' ?>

<?php startblock('title') ?>
Grades
<?php endblock() ?>

<?php startblock('body') ?>

<?php

if (isset($_POST["update"])) {
  $id = $_POST['course_id'];


  $student_code = $_POST["student_code"];
  $class_work = $_POST["class_work"];
  $mid = $_POST["mid"];
  $final = $_POST["final"];


  $query3 = "UPDATE grades SET Class_Work='$class_work', Midterm='$mid', Final='$final' WHERE Course_ID='$id' AND Student_Code='$student_code';";
  $result3 = mysqli_query($con,$query3);
  if ($result3) {
    echo "Values updated successfully.";

    echo '<script>window.location.href = window.location.pathname + "?course=' . $id . '";</script>';
  } else {
    echo "Error updating values: " . mysqli_error($con);
  }
}
?>

<table class="container2">
  <thead>
    <tr>
      <th>Student code</th>
      <th>Name</th>
      <th>Class work</th>
      <th>Mid term</th>
      <th>Final</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $id = $_GET['course'];
    $query = "SELECT * FROM grades WHERE Course_ID ='$id';";
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $student_code = $row["Student_Code"];
        $class_work = $row["Class_Work"];
        $mid = $row["Midterm"];
        $final = $row["Final"];
        $query2 ="SELECT Student_Name FROM student WHERE Student_Code ='$row[Student_Code]';";
        $result2 = mysqli_query($con,$query2);
        $row2 = $result2->fetch_assoc();
        $student_name = $row2["Student_Name"];
        echo '<tr>
          <td>'.$student_code.'</td>
          <td>'.$student_name.'</td>
          <td>'.$class_work.'</td>
          <td>'.$mid.'</td>
          <td>'.$final.'</td>
          <td>
            <form action="'.$_SERVER['PHP_SELF'].'" method="post">
              <input type="hidden" name="student_code" value="'.$student_code.'">
              <input type="hidden" name="course_id" value="'.$id.'">
              <input type="number" name="class_work" value="'.$class_work.'" required>
              <input type="number" name="mid" value="'.$mid.'" required>
              <input type="number" name="final" value="'.$final.'" required>
              <button type="submit" name="update" class="update">Update</button>
            </form>
          </td>
        </tr>';
      }
    } else {
      echo "No Students found.";
    }
    ?>
  </tbody>
</table>

<?php endblock() ?>
