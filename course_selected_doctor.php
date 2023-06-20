
<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    $doc_data = check_doctor_login($con);
    
?>
<!DOCTYPE html>
<html>
 <title>
    Course Selection
 </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div id="header">
    <div class="user1">
      <h1><?php echo $doc_data['Name'];?></h1>
    </div>
    <div class="logo">
		<img src="your-logo.jpg" alt="Your Logo">
	</div>
    <a href="profile_page_doctor.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>
    <div>
        <h1 id="welcome">Add the drive link</h1>
    </div>
    <?php
    $id = $_GET['course'];
    $query = "SELECT Drive FROM courses WHERE Course_ID = '$id';";
    $result = mysqli_query($con, $query);
    
    $drive_link = mysqli_fetch_assoc($result)['Drive'];
    
    if (empty($drive_link) || is_null($drive_link)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // If the form has been submitted, update the database with the Drive link
            $drive_link = mysqli_real_escape_string($con, $_POST['drive_link']);
            $update_query = "UPDATE courses SET Drive = '$drive_link' WHERE Course_ID = '$id';";
            mysqli_query($con, $update_query);
            
            // Show an alert message and redirect the user to the updated Drive link
            echo "<script>alert('Drive link added successfully!');</script>";
            header("Location: doctor_homepage.php");
            exit();
        } else {
            // If Drive is empty or NULL, generate a page to add the drive link
            echo "<form method='post'>
            <div style='display: flex; justify-content: center;  flex-wrap: wrap;'>
                             
                          <input type='text' id='drive_link' name='drive_link' class='input-text'>
                          <input type='submit' value='Update' class='update-button'>
                      </div>      </form>";
        }
    } else {
        // If Drive isn't empty, redirect to the link
        header("Location: $drive_link");
        exit();
    }
?>
  </body>
</html