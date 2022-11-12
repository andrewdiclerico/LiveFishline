
<?php
    include __DIR__ . '/include/functions.php';
    // Include user database definitions
    include_once __DIR__ . '/models/adminUsers.php';


    // set logged in to false
    $_SESSION['isUserLoggedIn'] = false;

    $message = "";
if (isPostRequest()) 
{

    // get _POST form fields
    $userName = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    // Set up configuration file and create database
    $configFile = __DIR__ . '/models/dbconfig.ini';
    try 
    {
        $userDatabase = new Users($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    echo $userName . "    " . $password ;
    // Now we can check to see if use credentials are valid.
    if ($userDatabase->validateCredentials($userName, $password)) 
    {
        // If so, set logged in to TRUE
        $_SESSION['isLoggedIn'] = true;
        // Redirect to team listing page
        header ('Location: backend.php');
    } 
    else 
    {
        // Whoops! Incorrect login. Tell user and stay on this page.
        $message = "You did not enter correct login credentials.";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&family=Rock+Salt&family=Teko&display=swap" rel="stylesheet">
<link rel="icon" href="Images/catch.png">

    <title>backend</title>
</head>
<body>
    

<h1>Backend</h1>
</body>
</html>