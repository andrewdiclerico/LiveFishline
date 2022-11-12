<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="HomePage.css" >
    <link rel="stylesheet" href="nav.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js%22%3E"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js%22%3E"></script>
    <link rel="stylesheet" href="style.css"/>
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
    a:hover{
      color:aqua;
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
</style>
<body style="text-align:center; background-color:#3E4144;">

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
                    <a class="nav-link-login" href="login.php"><i class="fa-solid fa-user-plus"></i> Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <br>
    <br>

    <?php
        require('db.php');
        // When form submitted, check and create user session.
        if (isset($_POST['username'])) {
            $username = stripslashes($_REQUEST['username']);    // removes backslashes
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            // Check user is exist in the database
            $query    = "SELECT * FROM `users` WHERE username='$username'
                        AND password='$password';";
            $result = mysqli_query($con, $query) or die();
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: myProfile.php");
            } else {
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
            }
        } else {
    ?>

        <form style="text-align:center" class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required />
            <input type="password" class="login-input" name="password" placeholder="Password" required />
            <input type="submit" value="Login" name="submit" class="login-button"/>
            <p class="link"><a href="registration.php"><u>New Registration</u></a></p>
            <p style="padding-bottom:10px;" class="link"><a href="backend/adminLogin.php"><u>Admin Login</u></a></p>


        </form>
    <?php
        }
    ?>
    
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br>

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