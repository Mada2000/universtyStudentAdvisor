<?php include 'layout.php' ?>

<?php startblock('title') ?>
    Material
<?php endblock() ?>

<?php startblock('body') ?>
    <div>
        <h1 id="welcome">Which Subject ?</h1>
    </div>
    <div id="tabs">
    <?php
    $student_code = $user_data['Student_Code'];
    $query = "SELECT Course_Name, Drive FROM courses WHERE course_ID IN (SELECT Course_ID FROM enrolls WHERE Student_Code ='$student_code'); ";
    $result = mysqli_query($con,$query);
    // Display the anchor tags for each course returned by the query
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $course_name = $row["Course_Name"];
            $drive = $row["Drive"];
            echo '<div class="tab-card">
                    <a href="'.($drive ? $drive : '#').'" onclick="'.($drive ? '' : 'alert(\'Drive isn\'t yet specified.\');').'">'.$course_name.'</a>
                  </div>';
            
        }
    } else {
        echo "No courses found.";
    }
?>

    </div>
<?php endblock() ?>