<?php include 'layout.php' ?>

<?php startblock('title') ?>
    Homepage
<?php endblock() ?>

<?php startblock('body') ?>
    <div>
        <h1 id="welcome">What do you want to do?</h1>
    </div>
    <div id="tabs">
        <div class="tab-card">
            <a href="material.php">View Material</a>
        </div>
        <div class="tab-card">
            <a href="#tab2">Quizzes</a>
        </div>
        <div class="tab-card">
            <a href="#tab3">Attendance</a>
        </div>
        <div class="tab-card">
            <a href="courses.php">Enroll for New Courses</a>
        </div>
        <div class="tab-card">
            <a href="courses_student_grades.php">Grades</a>
        </div>
    </div>
<?php endblock() ?>