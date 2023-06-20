<?php include 'layout_affairs.php' ?>

<?php startblock('title') ?>
Profile Page
<?php endblock() ?>

<?php startblock('body') ?>
<form method="post" action="process_form_student.php">
  <div class="container">
    <h1>Profile Page</h1>
    <div class="field">
      <div class="field-name">Name:</div>
      <div class="field-value"><input type="text" name="Student_Name"></div>
    </div>

    <div class="field">
      <div class="field-name">Password:</div>
      <div class="field-value"><input type="password" name="password"></div>
    </div>

    <div class="field">
      <div class="field-name">Age:</div>
      <div class="field-value"><input type="number" name="Age"></div>
    </div>

    <div class="field">
      <div class="field-name">Year:</div>
      <div class="field-value"><input type="text" name="Year"></div>
    </div>

    <div class="field">
      <div class="field-name">Semester:</div>
      <div class="field-value"><input type="text" name="Semester"></div>
    </div>

    <div class="field">
      <div class="field-name">Faculty:</div>
      <div class="field-value"><input type="text" name="Faculty"></div>
    </div>

    <div class="field">
      <div class="field-name">Department:</div>
      <div class="field-value"><input type="text" name="Department"></div>
    </div>

    <div class="field">
      <div class="field-name">Student Code:</div>
      <div class="field-value"><input type="text" name="Student_Code"></div>
    </div>

    <div class="buttons">
      <button type="submit" id="edit-button">Save</button>
    </div>
  </div>
</form>
<?php endblock() ?>