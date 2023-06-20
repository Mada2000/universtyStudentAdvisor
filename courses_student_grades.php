<?php include 'layout.php' ?>

<?php startblock('title') ?>
Choose Course
<?php endblock() ?>

<?php startblock('body') ?>

<table class="container2">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Class work</th>
            <th>Mid term</th>
            <th>Final</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $student_code = $user_data['Student_Code'];
            //$query = "SELECT courses.Course_Name, grades.Midterm, grades.Final, grades.Class_Work FROM grades JOIN courses ON grades.Course_ID=courses.Course_ID WHERE courses.Course_ID IN (SELECT Course_ID FROM enrolls WHERE Student_Code ='$student_code'); ";
            $query = "SELECT * FROM grades WHERE Student_Code='$student_code'";
            $result = mysqli_query($con, $query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $class_work = $row["Class_Work"];
                    $mid = $row["Midterm"];
                    $final = $row["Final"];
                    $course_id = $row["Course_ID"];
                    $query2 = "SELECT Course_Name FROM courses WHERE Course_ID='$course_id'";
                    $result2 = mysqli_query($con, $query2);
                    $row2 = $result2->fetch_assoc();
                    echo '<tr>
                    <td>' . $row2['Course_Name'] . '</td>
                    <td>' . $class_work . '</td>
                    <td>' . $mid . '</td>
                    <td>' . $final . '</td>';

                }
            } else {
                echo "No courses found.";
            }
        ?>
    </tbody>
        </table>
    <?php endblock() ?>