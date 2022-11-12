<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create an account</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d78c2507ea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="font.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
    <title> sign up system</title>

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
            color: aqua;
        }
        .nav-link-login{
            color:aqua;
            padding-right: 20px;
        }
        .logo{
            padding: 1px;
        }
        .fa-solid{
            padding-right: 5px;
        }
        .navbar a:hover{
            color:black;
        }
        .nav-items{
            display: flex;
            justify-content: right;
        }
        .input{
            width: 10px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">

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
            <a class="nav-link-login" href="login.php"><i class="fa-solid fa-sailboat"></i>Login</a>
            <a class="nav-link-login" href="registration.php"><i class="fa-solid fa-user-plus"></i>Sign up</a>
            </li>
        </ul>

    </div>
    </nav>
    <!-- end of nav bar -->
</body>
<!-- The javacript starts here -->

</html>