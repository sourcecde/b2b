<?php
include 'db-operations.php';


if($_GET['id']!=''){
	$id=$_GET["id"];

	$message = deleteItem($id);
	if ($message) {
		header("location:all-item.php");

	} else {
		echo "Failed!";
	}
}

if($_GET['item_id']!='' && $_GET['isblocked']!='' ){
	$id=$_GET["item_id"];
	if ($_GET['isblocked'] == 'Y'){
		$message = makeActive($id);
	}
	// else{
	// 	$message = makeInactive($id);

	// }
	
	if ($message) {
		
		header("location:all-item.php");

	} else {
		echo "Failed!";
	}
}

?>