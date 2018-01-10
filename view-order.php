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
    $item_id=$order[2];
    $item_name=$order[3];
}

?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Add Salesman</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Add Salesman</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
            <h3 class="card-title">New Salesman Details</h3>
              <div class="card-body">

                <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>

               

                   <form id="addBorrowerForm"  role="form" method="post">

                     <input type="text" hidden="true" id="user_id" name="id" value="<?php echo $id; ?>"/>


                  
                        <div class="form-group">
                          <label class=" control-label" for="salesman">Salesman:</label>
                          <select class="form-control" id="salesman" name="salesman_id" placeholder="Select Salesman" readonly>
                            <option value="<?php echo $salesman_id; ?>"><?php echo $salesman_name; ?></option>
                          </select>
                        </div>


                        <div class="form-group">
                          <label class=" control-label" for="item">Item:</label>
                          <select class="form-control" id="item" name="item_id" placeholder="Select Item" readonly>
                            <option value="<?php echo $item_id; ?>"><?php echo $item_name; ?></option>
                          </select>
                        </div>




                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="window.location.href='<?php echo "edit-order.php?id=".$id; ?>';" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Order</button>
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