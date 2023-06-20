<?php include 'layout.php' ?>

<?php startblock('title') ?>
Enroll for new courses
<?php endblock() ?>

<?php startblock('body') ?>
<div>
    <h1 id="welcome">Which Subject ?</h1>
</div>
<div id="tabs">
    <?php
    $query = "SELECT courses.Course_ID, courses.Course_Name, courses.Pre, courses.Num, doctors.Name
            FROM courses
            INNER JOIN doctors ON courses.Doctor_Code=doctors.Doctor_Code;";
    $result = mysqli_query($con, $query);

    // Display the anchor tags for each course returned by the query
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_id = $row["Course_ID"];
            $course_name = $row["Course_Name"];
            $doctor_name = $row["Name"];
            $pre = $row["Pre"];
            echo '<div class="tab-carde"><p>' . $course_name . '</p><p class="course-text">' . $doctor_name . '<br><form method="post"><input type="hidden" name="course_id" value="' . $course_id . '"><input type="submit" class="enroll-btn" name="enroll_btn" value="Enroll"></form></p></div>';
        }
    } else {
        echo "No courses found.";
    }

    // Handle form submission
    if (isset($_POST['enroll_btn'])) {
        $course_id = $_POST['course_id'];

        $pre_query = "SELECT Pre FROM courses WHERE Course_ID = '" . $course_id . "';";
        $pre_result = mysqli_query($con, $pre_query);
        $pre_row = mysqli_fetch_assoc($pre_result);
        $pre_course_name = $pre_row["Pre"];
        if (!empty($pre_course_name)) {

            $completed_query = "SELECT * FROM enrolls WHERE Student_Code = '" . $user_data['Student_Code'] . "' AND Course_ID = (SELECT Course_ID FROM courses WHERE Course_Name = '" . $pre_course_name . "' LIMIT 1);";
            $completed_result = mysqli_query($con, $completed_query);
            if ($completed_result->num_rows == 0) {

                echo '<script>alert("You need to complete the prerequisite course ' . $pre_course_name . ' first!");</script>';
            } else {

                $enroll_query = "INSERT INTO enrolls (Course_ID, Student_Code) VALUES ('" . $course_id . "', '" . $user_data['Student_Code'] . "')";
                $grades_query = "INSERT INTO `grades`(`Course_ID`, `Student_Code`, `Class_Work`, `Midterm`, `Final`, `Total`) VALUES ('" . $course_id . "','" . $user_data['Student_Code'] . "','0','0','0','0')";
                if (mysqli_query($con, $enroll_query) && mysqli_query($con, $grades_query)) {
                    echo '<script>alert("Enrollment successful!");</script>';
                } else {
                    echo '<script>alert("Enrollment failed!");</script>';
                }
            }
        } else {

            $enroll_query = "INSERT INTO enrolls (Course_ID, Student_Code) VALUES ('" . $course_id . "', '" . $user_data['Student_Code'] . "')";
            $grades_query = "INSERT INTO `grades`(`Course_ID`, `Student_Code`, `Class_Work`, `Midterm`, `Final`, `Total`) VALUES ('" . $course_id . "','" . $user_data['Student_Code'] . "','0','0','0','0')";
            if (mysqli_query($con, $enroll_query) && mysqli_query($con, $grades_query)) {
                echo '<script>alert("Enrollment successful!");</script>';
            } else {
                echo '<script>alert("Enrollment failed!");</script>';
            }
        }
    }
    ?>
</div>
<?php endblock() ?>