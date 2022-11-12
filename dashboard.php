<?php
//include session.php file on all user panel pages
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
<link rel="icon" href="Images/catch.png">

</head>
<body style="background-color:#3E4144">
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>Do you want to logout?<p>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="myProfile.php">Back to Profile</a></p>

        
    </div>
</body>
</html>