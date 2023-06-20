<?php include 'layout.php' ?>

<?php startblock('title') ?>
Profile Page
<?php endblock() ?>

<?php startblock('body') ?>
    <div class="container">
        <h1>Profile Page</h1>
        <div class="field">
            <div class="field-name">Name:</div>
            <div class="field-value"><?php echo $user_data['Student_Name'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Age:</div>
            <div class="field-value"><?php echo $user_data['Age'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Year:</div>
            <div class="field-value"><?php echo $user_data['Year'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Semester:</div>
            <div class="field-value"><?php echo $user_data['Semester'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Faculty:</div>
            <div class="field-value"><?php echo $user_data['Faculty'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Department:</div>
            <div class="field-value"><?php echo $user_data['Department'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Student Code:</div>
            <div class="field-value"><?php echo $user_data['Student_Code'];?></div>
        </div>
    </div>
<?php endblock() ?>