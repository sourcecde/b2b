<?php

$hostname = "localhost";
$db_username = "root";
$dbname = "b2b";
$db_password = "";

// $hostname = "182.50.133.171";
// $db_username = "loanmanagement";
// $dbname = "loanmanagement";
// $db_password = "Loan@123"; 

$con = mysqli_connect($hostname, $db_username, $db_password, $dbname);
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}







// $q = "select * from b2b_users";
// $result = mysqli_query($con,$q);
// $value = @mysqli_num_rows($result);
// echo $value;


?>