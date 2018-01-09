<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";


$message="";
$display_message="none";
$message_type="alert-danger";

$name=@$_POST["name"];
$address=@$_POST["address"];
$city=@$_POST["city"];
$state=@$_POST["state"];
$mobile_no=@$_POST["mobile_no"];
$office_no=@$_POST["office_no"];
$pin=@$_POST["pin"];
$gstin=@$_POST["gstin"];

$type="borrower";

if($name!="")
{
  $display_message="block";
  include 'db-operations.php';
  $message=addparty($name,$address,$city,$state,$pin,$gstin,$mobile_no,$office_no);
  if($message)
  {
    $message="<strong>SUCCESS!</strong> Party added to the system!";
    $message_type="alert-success";
  }
  else
  {
    $message="<strong>FAILURE!</strong> " . $message . "!";
  }
}

?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Add Party</h1>
            <p>Manage Party Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Add Party</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">New Party Details</h3>
              <div class="card-body">
               
                   <form id="addBorrowerForm"  role="form" method="post" action="add-party.php">

                     <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>
                        
                        <div class="form-group">
                          <label class=" control-label" for="name">Name:</label>
                          
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Address</label>
                          <textarea class="form-control" rows="4" id="address" name="address" placeholder="Enter your address"></textarea>
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="city">City:</label>
                          
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="state">State:</label>
                          
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="pin">Pin:</label>
                          
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter Pin">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="gstin">GSTIN:</label>
                          
                            <input type="text" class="form-control" id="gstin" name="gstin" placeholder="Enter Phone">
                          
                        </div>


                        <div class="form-group">
                          <label class=" control-label" for="mobile_no">Mobile No:</label>
                          
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="office_no">Office No:</label>
                          
                            <input type="text" class="form-control" id="office_no" name="office_no" placeholder="Enter Offile No">
                          
                        </div>
                        
                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('addBorrowerForm').submit();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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