<?php

$username = filter_input(INPUT_GET, 'username');
$new_name = "";

include('db.php');

if (isset ($_FILES['fileToUpload'])) 
    {
        $tempName = $_FILES['fileToUpload']['tmp_name'];
        $path = getcwd() .DIRECTORY_SEPARATOR . 'Images';
        $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['fileToUpload']['name'];
        move_uploaded_file($tempName, $new_name);

        $fishImages = $_FILES['fileToUpload']['name'];
        //set insert statement
        $query = "UPDATE localcapstone_sum22.users SET userphoto = '$fishImages' WHERE username = '$username'";
        $result = mysqli_query($con, $query);

        header("Location: myProfile.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Picture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="HomePage.css"/>
    <link rel="stylesheet" href="nav.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js%22%3E"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js%22%3E"></script>
    <script src="https://kit.fontawesome.com/d78c2507ea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
    <link rel="icon" href="Images/catch.png">

</head>
<style>
    
    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .navbar{
      background-color: #2C5EE0;
      display: flex;
      justify-content: space-between; 
    }
    .navbar-brand{
      color: black;
    }
    .nav-link-login{
      color:black;
      padding: 15px 10px;
    }
    body{
      background-color: #3E4144;
    }
    .navbar a:hover{
      color:aqua;
    }
    .nav-items{
      display: flex;
      justify-content: right;
    }
    .charts{
      display: flex;
      justify-content: space-evenly;

    }
    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
      z-index:999;
    }
    .top{
      display: flex;
      align-items: center;
      justify-content: space-evenly;
    }
    .container{
      background-color: white;
    }
    .soc a{
      color: black;
      font-size: 35px;
      align-self: baseline;
      justify-content: space-between; 
      display: flex;
      display: inline-block;
      margin-right: 18px;
    }
    .soc{
      margin-right: 2px;
    }
    .soc a:hover{
      color:aqua;
    }
    .footer{
      background-color: #2C5EE0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .copy{
      font-size: 20px;
      margin-left: 12px;
    }
    .fish{
      display: flex;
      justify-content: space-evenly;
    }
    
    
    
    
    
    
    

</style>
<body>

    <nav class="sticky navbar navbar-expand-lg">
        <div class = "logo">  <!--Logo Div--> 
            <i class="fa-solid fa-fish-fins"></i>
            <a class="navbar-brand" href="index.php">FishLine.com</a> <!--Title for Nav-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="nav-items">
            <ul class="navbar-nav">
                <li class="login-item">
                    <a class="nav-link-login" href="recentlyCaught.php"><i class="fa-solid fa-sailboat"></i> Recently Caught</a>
                    <a class="nav-link-login" href="myProfile.php"><i class="fa-solid fa-user-plus"></i> Profile</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <br>
    <br>
    

    <div style="background-color:white; margin-left:25%; margin-right:25%; padding-bottom:45px; padding-top:25px;">

        <h1 style="text-align:center;">Change Profile Picture</h1>

        <form method="post" style="text-align:center;" enctype="multipart/form-data">
            <input type="file" id="fileToUpload" name="fileToUpload" required />
            <input type="submit" value="Upload">

            <br />
            <br />

        </form>        




    </div>

    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>

    <footer class = "footer">
  <div class = "copy">
  © Fish Line - 2022
  </div>
  <div class = "soc">
  <a href="https://www.facebook.com"><i class="fa-brands fa-square-facebook"></i></a>
  <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
  <a href="https://www.twitter.com"><i class="fa-brands fa-square-twitter"></i></a>
  </div>
</footer>

</body>    
</html>