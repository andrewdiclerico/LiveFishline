<?php


include_once __DIR__ . '/db.php';

$fishID = filter_input(INPUT_GET, 'id');


//set insert statement
$query = "DELETE FROM localcapstone_sum22.addfish WHERE fishID = '$fishID';";
//execute sql statement
$result = mysqli_query($con, $query);

Header("Location: myProfile.php");

?>