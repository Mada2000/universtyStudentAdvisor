<?php require_once 'ti.php' ?>
<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    $doc_data = check_doctor_login($con);
    
?>
<!DOCTYPE html>

<html>
<head>
  <title>
    <?php startblock('title') ?>
    <?php endblock() ?>
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
  <?php startblock('body') ?>
  <?php endblock() ?>
  <footer id="latest-news-footer">
    <h2>Latest news about SAMS</h2>
    <marquee width="100%" direction="left" height="20px">
        Sadat Academy for Management Sciences, is an Egyptian Public Academy under the authorization of the Ministry of State for Administrative Development, SAMS was founded in Egypt in 1981.
    </marquee>              
  </footer>
</body>
</html>

