<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";


$message="";
$display_message="none";
$message_type="alert-danger";

include 'db-operations.php';

$type="borrower";


if($_GET['id']!='')
{
    $id=$_GET["id"];
    $order=getOrderDetails($id);

    $salesman_id=$order[0];
    $salesman_name=$order[1];
    $party_id=$order[2];
    $party_name=$order[3];
}







if(isset($_POST['salesman_id']) && $_POST['salesman_id'] != "" &&
  isset($_POST['party_id']) && $_POST['party_id'] != ""
  ){

  $id=@$_POST["id"];

  $salesman_id = @$_POST['salesman_id'];
  $party_id = @$_POST['party_id'];


  $message = editOrderDetails($id,$salesman_id,$party_id);

  if($message){
    $message="<strong>SUCCESS!</strong> Party added to the system!";
    $message_type="alert-success";
  }else{
    $message="<strong>FAILURE!</strong> " . $message . "!";
  }
}

?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Edit Order</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Edit Order</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
            <h3 class="card-title">Edit Order Details</h3>
              <div class="card-body">

                <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>

               

                   <form id="addBorrowerForm"  role="form" method="post">

                     <input type="text" hidden="true" id="user_id" name="id" value="<?php echo $id; ?>"/>


                  
                        <div class="form-group">
                          <label class=" control-label" for="salesman">Salesman:</label>
                          <select class="form-control" id="salesman" name="salesman_id" placeholder="Select Salesman">
                            <option value="<?php echo $salesman_id; ?>"><?php echo $salesman_name; ?></option>
                            <?php
                            $salesmans = getSalesmans();
                              for ($i=0;$i<count($salesmans);$i++){
                                echo " <option value='" . $salesmans[$i]['id'] . "'>" .  $salesmans[$i]['name'] . "</option>";
                              }
                            ?>
                          </select>
                        </div>


                        <div class="form-group">
                          <label class=" control-label" for="party">Party:</label>
                          <select class="form-control" id="party" name="party_id" placeholder="Select Party">
                            <option value="<?php echo $party_id; ?>"><?php echo $party_name; ?></option>
                            <?php
                            $items = getAllParty();
                              for ($i=0;$i<count($items);$i++){
                                echo " <option value='" . $items[$i]['id'] . "'>" .  $items[$i]['name'] . "</option>";
                              }
                            ?>

                          </select>
                        </div>




                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('addBorrowerForm').submit();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
<?php 
include 'admin-footer.php';
?>