<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";

include 'db-operations.php';
$message="";
$display_message="none";
$message_type="alert-danger";

// $type="borrower";

if($_GET['id']!='')
{
    $id=$_GET["id"];
    $party=getPartyDetails($id);

    $name=$party['name'];
    $address=$party['address'];
    $city=$party['city'];
    $state=$party['state'];
    $pin=$party['pin'];
    $gstin=$party["gstin"];
    $mobile_no=$party['mobile_no'];
    $office_no=$party['office_no'];

}

?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Edit Party</h1>
            <p>Manage Party, Salesman & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Edit Party</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Edit Party Details</h3>
              <div class="card-body">

                  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>
                        
               
                   <form id="editBorrowerForm"  role="form" method="post" >
  
                     <input type="text" hidden="true" id="user_id" name="id" value="<?php echo $id; ?>"/>
  
                        
                        <div class="form-group">
                          <label class=" control-label" for="name">Name:</label>
                          
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class="control-label">Address</label>
                          <textarea class="form-control" rows="4" id="address" name="address" placeholder="Enter your address" readonly><?php echo $address; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="city">City:</label>
                          
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $city ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="state">State:</label>
                          
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $state ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="pin">Pin:</label>
                          
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter Pin" value="<?php echo $pin ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="gstin">GSTIN:</label>
                          
                            <input type="text" class="form-control" id="gstin" name="gstin" placeholder="Enter Phone" value="<?php echo $gstin ?>" readonly>
                          
                        </div>


                        <div class="form-group">
                          <label class=" control-label" for="mobile_no">Mobile No:</label>
                          
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No" value="<?php echo $mobile_no ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="office_no">Office No:</label>
                          
                            <input type="text" class="form-control" id="office_no" name="office_no" placeholder="Enter Offile No" value="<?php echo $office_no ?>" readonly>
                          
                        </div>
                        
                        
                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="window.location.href='<?php echo "edit-party.php?id=".$id; ?>';" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>
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