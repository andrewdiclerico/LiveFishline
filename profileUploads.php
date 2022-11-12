<?php

    include("session.php");
    include('db.php');
    //all the field names
    include_once __DIR__ . "/models/models_fish.php";
    include __DIR__ . '/include/functions.php';
    $configFile = __DIR__ . '/models/dbconfig.ini';
    try 
    {
      //create database
        $profilesDatabase = new Profile($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   

    $action = filter_input(INPUT_GET, 'action');
    $username = filter_input(INPUT_GET, 'username');
    $new_name = "profile.jpg";
    $name = $_SESSION['username'];    
    $state = "";
    $bio = "";


    if(isset($_GET['action'])){

        $row = $profilesDatabase->getprofile($name);


        if($action == "update"){

            
            $new_name = $row['userphoto'];
            $name = $row['name'];
            $state = $row['state'];
            $bio = $row['bio'];
        }
        else{
            $new_name = "";
            $name = "";
            $state = "";
            $bio = "";
        }
    }
    elseif(isset($_POST['action'])){

        $action = filter_input(INPUT_POST, 'action');
        $username = filter_input(INPUT_POST, 'username');
        $name = filter_input(INPUT_POST, 'name');
        $state = filter_input(INPUT_POST, 'state');
        $bio = filter_input(INPUT_POST, 'bio');

        if($action == 'add'){
            $results = $profilesDatabase->addprofiles($new_name,$name, $state, $bio);
        }
        elseif($action == 'update'){

            $results = $profilesDatabase->updateprofiles($username, $name, $state, $bio);            
            
        }
        header('Location: myProfile.php');
    }
    else{
        header('Location: myProfile.php');
    }
    

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
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
    a:hover{
      color:aqua;
    }
    
    
    
    
    
    
    

</style>
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
                    <a class="nav-link-login" href="myprofile.php"><i class="fa-solid fa-user-plus"></i> Profile</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    
    <!-- form to get user inputs -->
    <form class="form" action="profile_uploads.php" style="padding-bottom:25px;" method="post" enctype="multipart/form-data">

        <input type="hidden" id='action'  name='action' value=<?php echo $action; ?>>
        <input type="hidden" id='username' name='username' value=<?php echo $username; ?>>
        
        <h1 class="login-title">Edit Profile</h1> <!-- form title -->
        <input type="text" class="login-input" name="name" id="name" placeholder="Name" value=<?php echo $name ?> style="width:100%;" required />
        <select class="form-control" id="state"name="state" value=<?php $state ?>>
            <option value="<?php echo $state ?>"><?php echo $state ?></option>
            <option value="RI">RI</option>
            <option value="CT">CT</option>
            <option value="NY">NY</option>
        </select>
        
        <br />

        <input type="text" class="login-input" name="bio" id="bio" value=<?= $bio ?> style="width:100%;" required />
        
        <br />

        <input type="submit" name="submit" value="Update Bio" class="login-button" />

        <p class="link"><a href="myProfile.php">Discard</a></p>

    </form>

    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br>

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