<?php include 'layout_doctor.php' ?>

<?php startblock('title') ?>
    Course Selection
<?php endblock() ?>

<?php startblock('body') ?>
    <div>
        <h1 id="welcome">Which Subject ?</h1>
    </div>
    <div id="tabs">
        <?php
        $doc_code = $doc_data['Doctor_Code'];
        $query = "SELECT Course_ID, Course_Name FROM courses WHERE Doctor_Code = '$doc_code'; ";
        $result = mysqli_query($con,$query);
        // Display the anchor tags for each course returned by the query
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $course_name = $row["Course_Name"];
                $course_ID = $row["Course_ID"];
                echo '<div class="tab-card"><a href="course_selected_doctor.php?course='.urlencode($course_ID).'">'.$course_name.'</a><br></div>';
            }
        } else {
            echo "No courses found.";
        }

        ?>

    </div>
<?php endblock() ?>