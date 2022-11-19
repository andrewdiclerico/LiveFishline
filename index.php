<?php

    include __DIR__ . '/include/functions.php';
    require('db.php');
    include_once __DIR__ . '/models/search.php';
    
    $dquery = "SELECT species, count(*) as number FROM addfish GROUP BY species";
    $dresult = mysqli_query($con, $dquery);
    $bquery = "SELECT locations, count(*) as number FROM addfish GROUP BY locations";
    $bresult = mysqli_query($con, $bquery);
    $squery = "SELECT fishlength, fishweight, count(*) as number FROM addfish GROUP BY fishlength, fishweight";
    $sresult = mysqli_query($con, $squery);

    //badabase config
    $configFile = __DIR__ . '/models/dbconfig.ini';
    try 
    {
    $addfishDatabase = new FishSearch($configFile); // new search class
    } 
    catch ( Exception $error )  //error msg
    {
    echo "<h2>" . $error->getMessage() . "</h2>";
    }   

    $fish = [];
    if(isPostRequest()){

        if(isset($_POST['Search'])){
            //init. the variables
            $species = "";
            $fishweight = "";
            $locations = "";
            //Posting the fields 
            if($_POST['fieldName'] == 'species'){
                $species = $_POST['fieldValue'];    
            }
            elseif($_POST['fieldName'] == 'locations'){
              $locations = $_POST['fieldValue'];
            }
            elseif($_POST['fieldName'] == 'fishweight'){
    
                $fishweight = $_POST['fieldValue'];
            }
            //database 
            $fish = $addfishDatabase->Searchfish($species, $fishweight, $locations);
        }
        else{

            $id = filter_input(INPUT_POST, 'fishID');

            $addfishDatabase->deletefish($id);
            
            $fish = $addfishDatabase->getspecies();
        }    
        
        
    }  
    else{

      $fish = $addfishDatabase->getspecies();
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d78c2507ea.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="http://www.example.com/myicon.ico"/>
    <link rel="stylesheet" href="font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
    <link rel="icon" href="Images/catch.png">
    
    <style>
      
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
        position: sticky;
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
      .fish img:hover{
        padding:2%;
        
      }
      
      
      
    </style>
    <title>Capstone 2022 | Fish</title>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() 
    {
      var data = google.visualization.arrayToDataTable([
          ['species', 'Hours per Number'],
          <?php
          while($row = mysqli_fetch_array($dresult))
          {
            echo "['".$row["species"]."', ".$row["number"]."],";
          }
          ?>
      ]);

      var bdata = new google.visualization.arrayToDataTable([
          ['locations', 'Fish'],

          <?php
              if(mysqli_num_rows($bresult)> 0){
                while ($row = mysqli_fetch_array($bresult)){
                  echo "['".$row["locations"]."', ".$row["number"]."],";

                }
              }
          ?>

        ]);
      
      var sdata = google.visualization.arrayToDataTable([
        ['fishlength', '(in/lbs)'],
        <?php
          while($row = mysqli_fetch_array($sresult))
          {
            echo "['".$row["fishlength"]."', ".$row["fishweight"]."],";
          }
          ?>
      ]);

      var soptions = {
        title: 'Fish Sizes',
        hAxis: {title: 'Fish Weight (lbs)', minValue: 0, maxValue: 20},
        vAxis: {title: 'Fish Length (in)', minValue: 0, maxValue: 20},
        legend: 'none'
      };

      var doptions = {
          title:'Species Caught',
          pieHole: 0.35,
          slices: {
            0: { color: '#3366cc' },
            1: { color: '#dc3912' }
          }
          
      };

      var options = {
          title: 'Catches based on Location',
          width: 400,
          legend: { position: 'none' },
          chart: { title: 'Catches by Location',
                   subtitle: 'Catches by Number' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "70%" }

        };


      var dchart = new google.visualization.PieChart(document.getElementById('donutchart'));
      dchart.draw(data, doptions);
      
      var bchart = new google.visualization.BarChart(document.getElementById('top_x_div'));
      bchart.draw(bdata, options);

      var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
      chart.draw(sdata, soptions);

    }
  </script>

</head>

<body>

  <main>

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
            <a class="nav-link-login" href="recentlyCaught.php"><i class="fa-solid fa-sailboat"></i>Recently Caught</a>
            <a class="nav-link-login" href="login.php"><i class="fa-solid fa-user-plus"></i>Log In</a>
          </li>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      <!-- <div class="col-sm-offset-2 col-sm-10"> -->
      
        <br>

        <h1 style="text-align:center;">Home</h1>

        <br>

        <div class = "fish">
          <div>
          <a href="bass.php"><img src="images/LargeMouthBass.png" width="400" 
          height="200"/></a>
          </div>
          <div>
          <a href="trout.php"><img src="images/BrookTrout.jpg" width="400" 
          height="200" /></a>
          </div>
          </div>

          <br>
        <h2 style="text-align:center;">Stats</h2> 
        
        <br>
        
        <div class = "top">
        <div>
        <?php
        $len = "SELECT AVG(fishlength) as 'avglen' FROM addfish";
        $lenres = mysqli_query($con, $len);
        $lendata = mysqli_fetch_array($lenres);
        echo "Average Fish Length: <b>" . round($lendata['avglen'], 2) . " in</b>";
        ?>
        </div>
        <div>
        <?php
        $avg = "SELECT AVG(fishweight) as 'avgweight' FROM addfish";
        $avgres = mysqli_query($con, $avg);
        $avgdata = mysqli_fetch_array($avgres);
        echo "Average Fish Weight: <b>" . round($avgdata['avgweight'], 2) . " lbs</b>";
        ?>
        </div>
        <div>
        <?php
         $long = "SELECT MAX(fishlength) as 'long' FROM addfish";
         $longres = mysqli_query($con, $long);
         $longdata = mysqli_fetch_array($longres);
         echo "Top Fish Length: <b>" . round($longdata['long'], 2) . " in</b>";
        ?>
        </div>
        <div>
        <?php
         $big = "SELECT MAX(fishweight) as 'big' FROM addfish";
         $bigres = mysqli_query($con, $big);
         $bigdata = mysqli_fetch_array($bigres);
         echo "Top Fish Weight: <b>". round($bigdata['big'], 2) . " lbs</b>";
        ?>
        </div>
        </div>
        
        <br>
        <div class ="charts">
        <div id="donutchart" style="width: 400px; height: 300px;"></div>
        <div id="top_x_div" style="width: 400px; height: 300px;"></div> 
        <div id="chart_div" style="width: 400px; height: 300px;"></div>
      </div>

      <br>

      <!-- Header -->
      <h2 style="text-align:center;">Recently Caught</h2>

      <br>

      <!-- Form -->
      <form action="#" style="text-align:center; top:15px;" class="sticky" method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="search" />
          <!-- Header -->
          <label>Search by:</label>
          <!-- dropdown list -->
          <select name="fieldName">
          <option value="">Select One</option>
          <option value="species">Species</option>
          <option value="fishweight">Weight (lbs)</option>
          <option value="locations">Location</option>
          </select>
          <input type="text" style="justify-content:center;" name="fieldValue" />
          <button type="submit" name="Search">Search</button>
      </form>
      
      
      <?php
         $rel = "";
         if ($row['released'] = 1){
             $rel = "Yes";
         }
         else{
             $rel = "No";
         }
      ?>
     
    
      <?php foreach ($fish as $row):


           echo "<div class='grid-container' style='background-color:white; '>" .
                "<div class='item1'>" . 
                    "<div style='text-align:center;'>
                        <b>Species</b>: " . $row['species'] . "</b>
                    </div>
                </div>" . 
                "<div class='item2' style='background-color:#EAE7E7; padding-bottom:10px;'>" . 
                    "<div>" . "<img style='width:180px; height:80px;' src='/se266/Final Fish/Images/" . $row['images'] . "' style='width: 180px;'></div>
                </div>" . 
                "<div class='item3' style='background-color:#EAE7E7;'>
                    <div style='text-align:left;'>
                        <b>Fish Length</b>: " . $row['fishlength'] . "<br />" . 
                        "<b>Fish Weight</b>: " . $row['fishweight'] . 
                    "</div>" . 
                "</div>" .
                "<div class='item4' style='background-color:#EAE7E7; float:left;'>" .
                    "<div style='text-align:left;'> 
                        <b>Location</b>: " . $row['locations'] . "<br />" . "
                        <b>Released</b>: " . $rel .
                    "</div>" . 
                "</div>" .
                "<div class='item5' style='background-color:#EAE7E7; float:left;'>" .
                    "<div style='width:150px; text-align:left'>" . 
                        "<b>Username</b>: " . $row['username'] . "<br />" .
                        "<b>Comments</b>: " . $row['notes'] . 
                    "</div>" .
                "</div>" .
            "</div>";
       endforeach; ?>
           
    </div>
      
      
    <br>
    <br>
    <br>

      
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
     
  </main>

</body>
</html>