<?php include 'layout_doctor.php' ?>

<?php startblock('title') ?>
Grades
<?php endblock() ?>

<?php startblock('body') ?>

  <?php
  
  ?>
  <form method="post">
    <table class="container2">
      <thead>
        <tr>
          <th>Student code</th>
          <th>Name</th>
          <th>Class work</th>
          <th>Mid term</th>
          <th>Final</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_GET['course'];
        $query = "SELECT * FROM grades WHERE Course_ID ='$id';";
        $result = mysqli_query($con,$query);
        // Display the anchor tags for each course returned by the query
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $student_code = $row["Student_Code"];
                $class_work = $row["Class_Work"];
                $mid = $row["Final"];
                $final = $row["Midterm"];
                $query2 ="SELECT Student_Name FROM student WHERE Student_Code ='$row[Student_Code]';";
                $result2 = mysqli_query($con,$query2);
                $row2 = $result2->fetch_assoc();
                $student_name = $row2["Student_Name"];
                echo '<tr>
                  <td>'.$student_code.'</td>
                  <td>'.$student_name.'</td>
                  <td>'.$class_work.'</td>
                  <td>'.$mid.'</td>
                  <td>'.$final.'</td>
                </tr>';
            }
        } else {
            echo "No Students found.";
        }

        
        ?>
        <tr>
          <td>001</td>
          <td>John Doe</td>
          <td><input type="number"  value="85"></td>
          <td><input type="number"  value="75"></td>
          <td><input type="number"  value="80"></td>
          <td><button>Edit</button></td>
        </tr>
        <tr>
          <td>002</td>
          <td>Jane Smith </td>
          <td><input type="number" name="class_work[]" value="90"></td>
          <td><input type="number" name="mid_term[]" value="85"></td>
          <td><input type="number" name="final[]" value="90"></td>
        </tr>
        <tr>
          <td>003</td>
          <td>Bob Johnson</td>
          <td><input type="number" name="class_work[]" value="80"></td>
          <td><input type="number" name="mid_term[]" value="92"></td>
          <td><input type="number" name="final[]" value="88"></td>
        </tr>
        <tr>
          <td>004</td>
          <td>Bob Marley</td>
          <td><input type="number" name="class_work[]" value="80"></td>
          <td><input type="number" name="mid_term[]" value="92"></td>
          <td><input type="number" name="final[]" value="88"></td>
        </tr>
        <tr>
          <td>005</td>
          <td>Mohamed Ahmed</td>
          <td><input type="number" name="class_work[]" value="80"></td>
          <td><input type="number" name="mid_term[]" value="92"></td>
          <td><input type="number" name="final[]" value="88"></td>
        </tr>
      </tbody>
    </table>
    <div class="buttons">
    <button id="edit-button">Edit</button>
    <button id="save-button">Save</button>
  </div>
</form>
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $class_work = $_POST['class_work'];
    $mid_term = $_POST['mid_term'];
    $final = $_POST['final'];
    
    // Update database or perform other actions with the data
    // ...
  }
?>

<script>
  function editGrade(studentCode) {
    // Get the table row and values
    var row = document.getElementById(studentCode);
    var classWork = row.cells[2].querySelector("input").value;
    var midterm = row.cells[3].querySelector("input").value;
    var final = row.cells[4].querySelector("input").value;
    
    // Display a form to modify the values
    var form = document.createElement("form");
    form.innerHTML = `
      <label for="classWork">Class Work:</label>
      <input type="number" name="classWork" value="${classWork}" required><br>
      <label for="midterm">Midterm:</label>
      <input type="number" name="midterm" value="${midterm}" required><br>
      <label for="final">Final:</label>
      <input type="number" name="final" value="${final}" required><br>
      <button type="submit">Save</button>
    `;
    row.cells[2].innerHTML = "";
    row.cells[3].innerHTML = "";
    row.cells[4].innerHTML = "";
    row.cells[5].appendChild(form);
    
    // Submit the form to update the database
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      var formData = new FormData(form);
      formData.append("studentCode", studentCode);
      fetch("update.php", {
        method: "POST",
        body: formData
      }).then(function(response) {
        if (response.ok) {
          response.text().then(function(text) {
            row.cells[2].innerHTML = text.classWork;
            row.cells[3].innerHTML = text.midterm;
            row.cells[4].innerHTML = text.final;
            row.cells[5].innerHTML = `<button onclick="editGrade('${studentCode}')">Edit</button>`;
          });
        } else {
          alert("Failed to update the grade.");
        }
      }).catch(function(error) {
        alert("Failed to update the grade: " + error.message);
      });
    });
  }
</script>
<?php endblock() ?>
