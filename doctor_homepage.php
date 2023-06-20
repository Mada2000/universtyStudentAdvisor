<?php include 'layout_doctor.php' ?>

<?php startblock('title') ?>
    Homepage
<?php endblock() ?>

<?php startblock('body') ?>
    <div>
        <h1 id="welcome">What do you want to do?</h1>
    </div>
    <div id="tabs">
        <div class="tab-card">
            <a href="material_doctor.php">Add Material</a>
        </div>
        <div class="tab-card">
            <a href="#tab2">Quizzes</a>
        </div>
        <div class="tab-card">
            <a href="">Attendance</a>
        </div>
        <div class="tab-card">
            <a href="courses_doctor_grades.php">Grades</a>
        </div>
    </div>
<?php endblock() ?>