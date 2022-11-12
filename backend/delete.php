<?php
    //initialize variable
    $fishid = 0;

    //set variable to 'fishid' from url
    $fishid = $_GET['fishid'];    

    //include sql connection file (db.php)
    include_once '../db.php';

    //sql DELETE statement to delete record from 'users' table WHERE id = $fishid
    $sql = "DELETE FROM localcapstone_sum22.users WHERE id = $fishid";

    //REdirect to adminDashboard.php
    if(mysqli_query($con, $sql)){
        header("Location: ../adminDashboard.php");
    }
    else{
        header("Location: ../adminDashboard.php");
    }
     
    //close sql connection
    mysqli_close($con)

?>
<html>
    <head>
        <link rel="stylesheet" href="font.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
    </head>
</html>