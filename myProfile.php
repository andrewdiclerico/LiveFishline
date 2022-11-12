<?php
    //session_start();


include("session.php");
require('db.php');
include __DIR__ . '/include/functions.php';
include_once __DIR__ . "../models/models_fish.php"; 
//all the field names


$configFile = __DIR__ . '/models/dbconfig.ini';

$profileDatabase = '';
try 
{
  //create database
    $profileDatabase = new Profile($configFile);
} 
catch ( Exception $error ) 
{
    echo "<h2>" . $error->getMessage() . "</h2>";
}   
// uploading file
// define ("UPLOAD_DIRECTORY", "upload");


$usersProfile = $_SESSION['username'];
$row = $profileDatabase->getProfile($usersProfile);
$name = $row['name'];
$state = $row['state'];
$bio = $row['bio'];
$images = $row['userphoto'];




//This is for testing
// echo $usersProfile;
// var_dump($row);

if(isPostRequest()){


}    
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');

        if($action == "update"){


       
       
       
       

            $name = $row['name'];
            $state = $row['state'];
            $bio = $row['bio'];
            $images = $row['userphoto'];
        }
        else{

            $name = "";
            $state = "";
            $bio = "";
            $images = "";
            
        }
    }

?>  
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="myProfile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d78c2507ea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
    <link rel="icon" href="Images/catch.png">

    <title>My Profile</title>

    <style>

        body{
            background-color:#EAE7E7;
        }

        .grid-container {
            display: grid;
            grid:
            'top top top top top top top'
            'pic left left main main right right'
            'pic left left main main right right';
            background-color: #EAE7E7;
            text-align:center;
            padding: 10px;
        }

        .item1 { grid-area: top; background-color: #EAE7E7; width:100%;}
        .item2 { grid-area: pic; background-color: #EAE7E7; width: 100%;}
        .item3 { grid-area: left; background-color: #EAE7E7; width:100%}
        .item4 { grid-area: main; background-color: #EAE7E7; width: 100%;}
        .item5 { grid-area: right; background-color: #EAE7E7; width:100%}
        
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
             
        }

        .bio{
            display: flex;
            justify-content: space-between;
        }

        .bio-list{
            list-style-type: none;
        }

        .bio-list .bio-item{
            display: inline-block;
            align-items: center;
            padding: 20px 10px;

        }

        .bio-item{
            text-align: center;
        }

        .container{
            text-align: center;
            background-color: white; 
            margin-top: 20px; 
            border: 1px solid #e0e0e0;
            width: 700px;

        }
        .center {
            text-align: center;
            background-color: white; 
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
          background-color: #EAE7E7;
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
        a:hover{
            color:aqua
        }
        a{
            color:black;
        }
        button:hover{
            padding:5%;
        }
    
        
    
        
      
    </style>

</head>
<body>

   
   
    <nav class="sticky navbar navbar-expand-lg">
        <div class = "logo">  <!--Logo Div--> 
            <i class="fa-solid fa-fish-fins"></i>
            <a class="navbar-brand" href="home.php">FishLine.com</a> <!--Title for Nav-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="nav-items">
            <ul class="navbar-nav">
                <li class="login-item">
                    <a class="nav-link-login" href="recentlycaught.php"><i class="fa-solid fa-sailboat"></i> Recently Caught</a>
                </li>
            </ul>
        </div>
    </nav>
   
    <br />
    <br />
   
    <!-- end of the navbar -->
    <div class="container">
        <h1 class="center">Welcome <?php echo $row['name']; ?></h1> 
        <div>
            <?php
                echo "<img src='/SE266/Final Fish/Images/" .  $row['userphoto'] . "' style='width: 250px; border-radius:100%;'></img>";
            ?>
        </div>





        <div class="bio-list" style="text-align:center;">

            <div class="bio-item">
                <p><b>Name</b>: <?php echo $name; ?></p> 
            </div>

            <div class="bio-item">
                <p><b>State</b>: <?php echo $state; ?></p>
            </div>

            <div class="bio-item">
                <p><b>Bio</b>: <?php echo $bio; ?></p>
            </div>

        </div>

        <div style="height:35px; width:65; float:left;">
            <label>Add Fish</label>
            <br>
            <a href="addfish.php?username=<?php echo $row['username'] ?>"><button><img src="Images/icon.png" style="padding:5%; height:35px; border-radius:100% width:35px;"></img></button></a>
        </div>
        
        <div style="height:35px; width:45; float:right;">
            <label>Logout</label>
            <br>
            <a href="dashboard.php" style="margin-bottom:15px;"><button><img src="Images/icon.png" style="height:35px; width:35px;"></img></button></a>
        </div>
        <br>
        <br>

        <a href="profile_uploads.php?action=update&username=<?php echo $row['username']; ?>"><u>Edit Profile</u></a> | 
        <a href="upload.php?action=update&username=<?php echo $row['username']; ?>"><u>Edit Picture</u></a>

        <br />
        <br />

    </div>

    <br>
    <br>

    <div style="text-align:center; margin-left:20%; margin-right:20%; background-color:white;">

        <?php

            //var_dump($_SESSION);

            include_once __DIR__ . '../db.php';
            //$sql = "SELECT username FROM users WHERE username = '$usersProfile'";
            //$result = mysqli_query($con, $sql);
            //$row = mysqli_fetch_assoc($result);
            $sql = "SELECT fishID, username, species, fishlength, fishweight, locations, released, notes, images FROM localcapstone_sum22.addfish WHERE username = '$usersProfile' ORDER BY fishID DESC";
            $res = mysqli_query($con, $sql);
            $rel = "";
            if ($row['released'] = 1){
                $rel = "Yes";
            }
            else{
                $rel = "No";
            }
            while ($rom = mysqli_fetch_assoc($res))
            {
                echo
                "<div class='grid-container' style='background-color:white;'>" .
                    "<div class='item1'>" . 
                        "<div style='text-align:center;'>
                            <b>Species</b>: " . $rom['species'] . "
                        </div>
                    </div>" . 
                    "<div class='item2' style='padding-bottom:15px; background-color:#EAE7E7;'>" . 
                        "<div>" . "<img style='width:180px; height:80px;' src='/se266/Final Fish/Images/" . $rom['images'] . "' style='width: 180px;'></div>
                    </div>" . 
                    "<div class='item3' style='background-color:#EAE7E7;'>
                        <div style='text-align:left;'>
                            <b>Fish Length</b>: " . $rom['fishlength'] . "<br />" . 
                            "<b>Fish Weight</b>: " . $rom['fishweight'] . "<br />" . 
                            "<a href='delete.php?id=". $rom['fishID'] . "'><b><u>Delete</u></b></a> | <a href='editFish.php?id=". $rom['fishID'] . "'><b><u>Edit</u></b></a><br>" . 
                        "</div>" . 
                    "</div>" .
                    "<div class='item4' style='background-color:#EAE7E7; float:left;'>" .
                        "<div style='text-align:left;'> 
                            <b>Location</b>: " . $rom['locations'] . "<br />" . "
                            <b>Released</b>: " . $rel .
                        "</div>" . 
                    "</div>" .
                    "<div class='item5' style='background-color:#EAE7E7; float:left;'>" .
                        "<div style=' width:150px; text-align:left'>" . 
                            "<b>Username</b>: " . $rom['username'] . "<br />" .
                            "<b>Comments</b>: " . $rom['notes'] . 
                        "</div>" .
                    "</div>" .
                "</div>";
            }
        ?>

    </div>  

    <br />
    <br />
    <br />
    <br />

    <footer class="footer">
        <div class="copy">
            © Fish Line - 2022
        </div>
        <div class="soc">
            <a href="https://www.facebook.com"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.twitter.com"><i class="fa-brands fa-square-twitter"></i></a>
        </div>
    </footer>

</body>
</html>