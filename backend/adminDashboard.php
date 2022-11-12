<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="HomePage.css" >
    <link rel="stylesheet" href="nav.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    body{
        background-color: #EAE7E7;
    }
    th, td{
        border: 5px;
        border-color: #EAE7E7;
        text-align:center;
    }
    
    .grid-container {
        display: grid;
        grid:
        'top left left main main right right'
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
<body>
    

    <nav class="sticky navbar navbar-expand-lg">
        <div class = "logo">  <!--Logo Div--> 
            <i class="fa-solid fa-fish-fins"></i>
            <a class="navbar-brand" href="../home.php">FishLine.com</a> <!--Title for Nav-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="nav-items">
            <ul class="navbar-nav">
                <li class="login-item">
                    <a class="nav-link-login" href="../recentlycaught.php"><i class="fa-solid fa-sailboat"></i> Recently Caught</a>
                    <a class="nav-link-login" href="../myprofile.php"><i class="fa-solid fa-user-plus"></i> Profile</a>
                </li>
            </ul>
        </div>
    </nav>


    <br>
    <br>
    <br>
    <br>


    <div style="background-color:white; margin-left:20%; margin-right:20%; padding-top:10px; padding-bottom:4px;">

        <div style="background-color:#EAE7E7; margin-left:10px; margin-right:10px;">

            <h1 style="text-align:center;">User Profiles</h1> <!-- Page Title -->

            <br />
            <br />

            <h2 style="text-align:center; padding-bottom:6px;">View all user information and delete if neccessary</h2> <!-- Page Description -->

        </div>
    
    </div>

    <br />

    <div style="background-color:white; margin-left:20%; padding-bottom:4px; margin-right:20%;">

        <?php 

            //include database connection file (db.php)
            include_once __DIR__ . '/../db.php';

            //Select statement to get all records from the users table
            $sql = "SELECT * FROM localcapstone_sum22.users";

            //Execute query on database
            $res = mysqli_query($con, $sql);
            
            //while loop to display records
            while ($rom = mysqli_fetch_assoc($res))
            {
                //set fishid to id for each record
                $fishid = $rom['id'];
                
                //echo html container to display records
                echo
                    "<div class='grid-container' style='background-color:white;'>" .
                        "<div class='item1'>" . 
                            "<div style='text-align:center;'>
                                <b>User ID: </b> " . $rom['id'] . "
                            </div>
                        </div>" . 
                        "<div class='item2' style='background-color:#EAE7E7;'>" . 
                            "<div>" . "<a href='delete.php/?fishid=" . $fishid . "'><img src='/se266/Capstone2022/Project2022/Images/trash.png' style='width: 20px; padding-bottom:10%;'>" . "</img></a></div>
                        </div>" . 
                        "<div class='item3' style='background-color:#EAE7E7;'>
                            <div style='text-align:left;'>
                                <b>Username</b>: " . $rom['username'] . "<br />" . 
                                "<b>Name</b>: " . $rom['name'] . "<br />" . 
                                "<b>E-Mail</b>: " . $rom['email'] .
                            "</div>" . 
                        "</div>" .

                        "<div class='item4' style='background-color:#EAE7E7; float:left;'>" .
                            "<div style='text-align:left;'> 
                                <b>Created</b>: " . $rom['create_datetime'] . "<br />" . "
                                <b>Password</b>: " . $rom['password'] . "<br />" . "
                                <b>State</b>: " . $rom['state'] .
                            "</div>" . 
                        "</div>" .
                        "<div class='item5' style='background-color:#EAE7E7; float:left;'>" .
                            "<div style='text-align:left'>" . 
                                "<b>Profile Picture</b>: " . $rom['userphoto'] . "<br />" .
                                "<b>Bio</b>: " . $rom['bio'] . 
                            "</div>" .
                        "</div>" .

                    "</div>";
            }
        ?>
    </div>     
        
    <br /><br />
    <br /><br />
    <br /><br /><br />
    
</div>

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