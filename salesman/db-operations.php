<?php


function getUpderType($userid){
  include('db-connect.php');
  $query = "SELECT type FROM `b2b_users` WHERE user_id = '".$userid."'";
  $result = mysqli_query($con,$query);
  $num = @mysqli_num_rows ($result);
  if ($num==1) 
  {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $usertype=$row['type'];
    return $usertype;
  } 
  else {
    return 0;
  }
}

function adminLogin($username,$password)
{
	include('db-connect.php');
  $query = "SELECT * FROM b2b_users WHERE username='".$username."' AND pwd='".$password."'";
  $result = mysqli_query($con,$query);
  $num = @mysqli_num_rows ($result);
  if ($num==1) 
  {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id=$row['id'];
    return $id;
  } 
  else {
    return 0;
  }
}

function getSalesmanCount()
{
  include('db-connect.php');
  $query = "SELECT count(1) id FROM b2b_users WHERE type = 'user'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $num = $row['id'];
  return $num;
}



function getItemCount(){
  include('db-connect.php');
  $query = "SELECT count(1) id FROM b2b_item";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $num = $row['id'];
  return $num;
}



function addSalesman($name,$address,$phone,$dob,$gender,$username,$password)
{
  $today = date("y.m.d");
  include('db-connect.php');
  $query = "INSERT INTO `b2b_users` (`id`, `name`, `address`, `mobile`, `dob`, `gender`, `username`, `pwd`, `created_on`, `isdeleted`, `isblocked`, `type`) VALUES (NULL, '".$name."', '".$address."', '".$phone."', '".$dob."', '".$gender."', '".$username."', '".$password."', '".$today."', 'N', 'N', 'user');";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}

function getSalesmans()
{ 
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_users`";
  $result = mysqli_query($con,$query);
  $values = array();
  $i=0;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
  {
    $values[] = $row;
  }
  return $values;
}


function getSalesmansDetails($id){
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_users` WHERE id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  return $row;
}


function editSalesmanDetails($id,$name,$address,$phone,$dob,$gender,$username,$password)
{
  include ("db-connect.php");
  $query = "UPDATE b2b_users SET name = '".$name."', address = '".$address."', mobile = '".$phone."', dob = '".$dob."', gender = '".$gender."', username = '".$username."', pwd = '".$password."' WHERE id = '".$id."'";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function deleteSalesman($id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_users` SET `isdeleted` = 'Y' WHERE `b2b_users`.`id` = '".$id."';";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function addItem($name,$quantity,$categoty,$description,$image)
{
  include ("db-connect.php");
  $query = "INSERT INTO `b2b_item` (`id`, `name`, `image`, `description`, `quantity`, `category`) VALUES (NULL, '".$name."', '".$image."', '".$description."', '".$quantity."', '".$categoty."');";

  if (mysqli_query($con,$query)) {
    return true;
  } else {
    return false;
  }
}



function getItems()
{
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_item`";
  $result = mysqli_query($con,$query);
  $values = array();
  $i=0;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
  {
    $values[] = $row;
  }
  return $values;
}


function getItemDetails($id){
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_item` WHERE id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  return $row;
}


function editItemDetails($id,$name,$quantity,$categoty,$description,$image)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_item` SET `name`='".$name."',`image`='".$image."',`description`='".$description."',`quantity`='".$quantity."',`category`='".$categoty."' WHERE id = '".$id."'";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}



function deleteItem($id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_item` SET `isdeleted` = 'Y' WHERE `b2b_item`.`id` = '".$id."'";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}

function makeActive($id)
{
  echo "dhukeche?";
  exit();
  include ("db-connect.php");
  $query = "UPDATE `b2b_item` SET `isblocked` = 'N' WHERE `b2b_item`.`id` = '".$id."'";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}

function makeInactive($id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_item` SET `isblocked` = 'Y' WHERE `b2b_item`.`id` = '".$id."'";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}

function getImageName($id){
  include('db-connect.php');
  $query = "SELECT image FROM `b2b_item` WHERE id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $image_name = $row['image'];
  return $image_name;
}

function getSalesmanName($id){
  include('db-connect.php');
  $query = "SELECT name FROM `b2b_users` WHERE id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $name = $row['name'];
  return $name;
}



function getPartyCount(){
  include('db-connect.php');
  $query = "SELECT count(1) id FROM b2b_party";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $num = $row['id'];
  return $num;
}

function addparty($name,$address,$city,$state,$pin,$gstin,$mobile_no,$office_no)
{
  $today = date("y.m.d");
  include ("db-connect.php");
  $query = "INSERT INTO `b2b_party` (`id`, `name`, `address`, `city`, `state`, `pin`, `gstin`, `mobile_no`, `office_no`, `isdeleted`, `created_on`) VALUES (NULL, '".$name."', '".$address."', '".$city."', '".$state."', '".$pin."', '".$gstin."', '".$mobile_no."', '".$office_no."', 'N', '".$today."')";

  if (mysqli_query($con,$query)) {
    return true;
  } else {
    return false;
  }
}

function getAllParty()
{ 
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_party` WHERE isdeleted = 'N'";
  $result = mysqli_query($con,$query);
  $values = array();
  $i=0;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
  {
    $values[] = $row;
  }
  return $values;
}

function getPartyDetails($id){
  include ("db-connect.php");
  $query = "SELECT * FROM `b2b_party` WHERE id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  return $row;
}


function editPartyDetails($id,$name,$address,$city,$state,$pin,$gstin,$mobile_no,$office_no)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_party` SET `name` = '".$name."', `address` = '".$address."', `city` = '".$city."', `state` = '".$state."', `pin` = '".$pin."', `gstin` = '".$gstin."', `mobile_no` = '".$mobile_no."', `office_no` = '".$office_no."' WHERE `b2b_party`.`id` = '".$id."'";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function deleteParty($id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_party` SET `isdeleted` = 'Y' WHERE `b2b_party`.`id` = '".$id."'";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}



function getOrderCount($id)
{
  include('db-connect.php');
  $query = "SELECT count(1) id FROM `b2b_order_specific` WHERE salesman_id = '".$id."'";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $num = $row['id'];
  return $num;
}


function addOrder($salesman_id,$item_id)
{
  $today = date("y.m.d");
  include('db-connect.php');
  $query = "INSERT INTO `b2b_order_specific` (`id`, `salesman_id`, `item_id`, `created_on`, `isdeleted`, `isblocked`) VALUES (NULL, '".$salesman_id."', '".$item_id."', '".$today."', 'N', 'N');";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function getAllOrder()
{ 
  include ("db-connect.php");
  $query = "SELECT b2b_order_specific.id, b2b_order_specific.salesman_id, b2b_order_specific.item_id, b2b_users.name, b2b_item.name, b2b_order_specific.created_on FROM `b2b_order_specific`, `b2b_users`, `b2b_item` WHERE b2b_order_specific.salesman_id = b2b_users.id and b2b_order_specific.item_id = b2b_item.id and b2b_order_specific.isdeleted = 'N'";

  $result = mysqli_query($con,$query);
  $values = array();
  $i=0;
  while($row = mysqli_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}

function deleteOrder($id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_order_specific` SET `isdeleted` = 'Y' WHERE `b2b_order_specific`.`id` = '".$id."'";
  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function getOrderDetails($id){
  include ("db-connect.php");
  $query = "SELECT b2b_order_specific.salesman_id, b2b_users.name, b2b_order_specific.item_id ,b2b_item.name FROM `b2b_order_specific`, b2b_users, b2b_item WHERE b2b_order_specific.id = '".$id."'and b2b_order_specific.salesman_id = b2b_users.id and b2b_order_specific.item_id = b2b_item.id";
  $result = mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);
  return $row;
}


function editOrderDetails($id,$salesman_id,$item_id)
{
  include ("db-connect.php");
  $query = "UPDATE `b2b_order_specific` SET `salesman_id` = '".$salesman_id."', `item_id` = '".$item_id."' WHERE `b2b_order_specific`.`id` = '".$id."'";

  if (mysqli_query($con,$query)) {
    return true;
  } 
  else {
    return false;
  }
}


function getAllOrderForSalesman($id)
{ 
  include ("db-connect.php");
  $query = "SELECT b2b_order_specific.id, b2b_order_specific.salesman_id, b2b_order_specific.item_id, b2b_users.name, b2b_item.name, b2b_order_specific.created_on FROM `b2b_order_specific`, `b2b_users`, `b2b_item` WHERE b2b_order_specific.salesman_id = b2b_users.id and b2b_order_specific.item_id = b2b_item.id and b2b_order_specific.isdeleted = 'N' and b2b_order_specific.salesman_id = '".$id."'";

  $result = mysqli_query($con,$query);
  $values = array();
  $i=0;
  while($row = mysqli_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}


?>