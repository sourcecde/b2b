<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";


$message="";
$display_message="none";
$message_type="alert-danger";

include 'db-operations.php';

$id = $_SESSION['user_id'];
$name = getSalesmanName($id);

$type="borrower";

$salesman_id = @$_POST['salesman_id'];
$item_id = @$_POST['item_id'];


if(isset($item_id) && $item_id != ""){
  $message = addOrder($id,$item_id);

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

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" readonly>
                        </div> 


                        <div class="form-group">
                          <label class=" control-label" for="item">Party:</label>
                          <select class="form-control" id="item" name="item_id" placeholder="Select Item">
                            <option value="">Select Party</option>
                            <?php
                            $allparty = getAllParty();
                              for ($i=0;$i<count($allparty);$i++){
                                echo " <option value='" . $allparty[$i]['id'] . "'>" .  $allparty[$i]['name'] . "</option>";
                              }
                            ?>

                          </select>

                        <hr>

                        </div>

                        <div class="form-group">
                          <table class="table table-hover table-bordered" id="sampleTable">
                            <tbody>
                              <tr>
                                <td>One</td>
                                <td>
                                  <input type="text" class="form-control"  value="1">
                                </td>
                              </tr>
                              <tr>
                                <td>Two</td>
                                <td>
                                  <input type="text" class="form-control"  value="1">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Three
                                </td>
                                <td>
                                  <input type="text" class="form-control"  value="1">
                                </td>
                              </tr>
                            </tbody>
                          </table>
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


          <!-- Search -->


          <div class="col-md-6">
            <div class="card">
            <h3 class="card-title">Search Items</h3>
              <div class="card-body">
               
                   <form id=""  role="form" method="post" >

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Search">
                        </div> 


                        <div class="form-group">
                          <label class=" control-label" for="category">Category:</label>
                          <select class="form-control" id="category" name="category" placeholder="select Category">
                            <option value="">Select Category</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                          </select>
                        </div>


                  </form>
               </div>

               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('addBorrowerForm').submit();" type="button">Search</button>
                  </div>
                </div>
              </div>

              <hr>
               <table class="table table-hover table-bordered" id="sampleTable">
                  <tbody>
                    <tr>
                      <td>One</td>
                      <td>
                        <button class="btn btn-primary col-md-offset-9" onclick="document.getElementById('addBorrowerForm').submit();" type="button">Add</button>
                      </td>
                    </tr>
                    <tr>
                      <td>Two</td>
                      <td>
                        <button class="btn btn-primary col-md-offset-9" onclick="document.getElementById('addBorrowerForm').submit();" type="button">Add</button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Three
                      </td>
                      <td>
                        <button class="btn btn-primary col-md-offset-9" onclick="document.getElementById('addBorrowerForm').submit();" type="button">Add</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

            </div>
          </div>



        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/main.js"></script>
<?php 
include 'admin-footer.php';
?>