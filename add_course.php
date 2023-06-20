<?php include 'layout_affairs.php' ?>

<?php startblock('title') ?>
Profile Page
<?php endblock() ?>

<?php startblock('body') ?>
<form method="post" action="process_form_course.php">
  <div class="container">
    <h1>Profile Page</h1>
    <div class="field">
      <div class="field-name">Course ID:</div>
      <div class="field-value"><input type="text" name="id"></div>
    </div>

    <div class="field">
      <div class="field-name">Doctor Code:</div>
      <div class="field-value"><input type="text" name="doc_code"></div>
    </div>

    <div class="field">
      <div class="field-name">Course Name:</div>
      <div class="field-value"><input type="text" name="name"></div>
    </div>

    <div class="field">
      <div class="field-name">Max number:</div>
      <div class="field-value"><input type="number" name="num"></div>
    </div>
    <div class="field">
      <div class="field-name">Pre:</div>
      <div class="field-value"><input type="text" name="pre"></div>
    </div>

    <div class="buttons">
      <button type="submit" id="edit-button">Add</button>
    </div>
  </div>
</form>
<?php endblock() ?>