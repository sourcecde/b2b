<?php
include 'db-operations.php';


if($_GET['id']!=''){
	$id=$_GET["id"];

	$message = deleteOrder($id);
	if ($message) {
		header("location:all-order.php");

	} else {
		echo "Failed!";
	}
}

?>