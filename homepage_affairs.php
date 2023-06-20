<?php include 'layout_affairs.php' ?>

<?php startblock('title') ?>
    Homepage
<?php endblock() ?>

<?php startblock('body') ?>
    <div>
        <h1 id="welcome">What do you want to do?</h1>
    </div>
    <div id="tabs">
        <div class="tab-card">
            <a href="create_student.php">Create Student Account</a>
        </div>
        <div class="tab-card">
            <a href="create_doctor.php">Create Doctor Account</a>
        </div>
        <div class="tab-card">
            <a href="add_course.php">Add Course</a>
        </div>

    </div>
<?php endblock() ?>