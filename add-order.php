<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";


$message="";
$display_message="none";
$message_type="alert-danger";

include 'db-operations.php';

$type="borrower";

$salesman_id = @$_POST['salesman_id'];
$item_id = @$_POST['item_id'];


if(isset($salesman_id) && $salesman_id != "" && isset($item_id) && $item_id != ""){
  $message = addOrder($salesman_id,$item_id);

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
            <h1><i class="fa fa-user-plus"></i> Add Order</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Add Order</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
            <h3 class="card-title">New Order Details</h3>
              <div class="card-body">

                 <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>

               
                   <form id="addBorrowerForm"  role="form" method="post" action="add-order.php">

                        <div class="form-group">
                          <label class=" control-label" for="salesman">Salesman:</label>
                          <select class="form-control" id="salesman" name="salesman_id" placeholder="Select Salesman">
                            <option value="">Select Salesman</option>
                            <?php
                            $salesmans = getSalesmans();
                              for ($i=0;$i<count($salesmans);$i++){
                                echo " <option value='" . $salesmans[$i]['id'] . "'>" .  $salesmans[$i]['name'] . "</option>";
                              }
                            ?>
                          </select>
                        </div>


                        <div class="form-group">
                          <label class=" control-label" for="item">Item:</label>
                          <select class="form-control" id="item" name="item_id" placeholder="Select Item">
                            <option value="">Select Item</option>
                            <?php
                            $items = getItems();
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
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('addBorrowerForm').submit();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Order</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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