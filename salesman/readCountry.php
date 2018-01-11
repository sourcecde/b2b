<?php

require_once("db-connect.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT name FROM b2b_item WHERE name like '%" . $_POST["keyword"] . "%'";
$result = mysqli_query($con,$query);
if(!empty($result)) {
?>
<div id="form-control">
<?php
foreach($result as $item) {
?>
<div onClick="selectCountry('<?php echo $item["name"]; ?>');"><b><?php echo $item["name"]; ?></b></div>
<?php } ?>
</div>
<?php } } ?>
<?php 
if(!empty($_POST["id"])) {

	echo "mimiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";exit;
}
?>