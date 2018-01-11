<?php
	include('db-connect.php');
    $key=$_GET['key'];
    $array = array();
    
    $query=mysqli_query($con,"select * from b2b_item where name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['name'];
    }
    echo json_encode($array);
?>
