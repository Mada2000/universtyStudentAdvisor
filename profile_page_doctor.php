<?php include 'layout_doctor.php' ?>

<?php startblock('title') ?>
Profile Page
<?php endblock() ?>

<?php startblock('body') ?>
    <div class="container">
        <h1>Profile Page</h1>
        <div class="field">
            <div class="field-name">Name:</div>
            <div class="field-value"><?php echo $doc_data['Name'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Age:</div>
            <div class="field-value"><?php echo $doc_data['Age'];?></div>
        </div>

        <div class="field">
            <div class="field-name">Doctor Code:</div>
            <div class="field-value"><?php echo $doc_data['Doctor_Code'];?></div>
        </div>
    </div>
<?php endblock() ?>