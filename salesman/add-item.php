<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";


$message="";
$display_message="none";
$message_type="alert-danger";

$name = @$_POST['name'];
$quantity = @$_POST['quantity'];
$category = @$_POST['category'];
$description = @$_POST['description'];
$category = @$_POST['category'];
$image = @$_POST['image'];


if($name!="" && $quantity != "" && $category != "" && $description != "" && $image != "")
{
  $display_message="block";
  include 'db-operations.php';
  
  $message=addItem($name,$quantity,$category,$description,$image);

  if($message)
  {
    $message="<strong>SUCCESS!</strong> Item added to the system!";
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
            <h1><i class="fa fa-user-plus"></i> Add Item</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Add Item</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">New Item Details</h3>
              <div class="card-body">

                   <form id="addBorrowerForm"  role="form" method="post" action="add-item.php">

                     <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>
                        
                        <div class="form-group">
                          <label class=" control-label" for="name">Name:</label>
                          
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="quantity">Quantity:</label>
                          
                            <input type="text" class="form-control" id="quantity" required="required" name="quantity" placeholder="Enter quantity">
                          
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


                        <div class="form-group">
                          <label class="control-label">Description:</label>
                          <textarea class="form-control" rows="4" id="description" name="description" placeholder="Item Description"></textarea>
                        </div>

                         <div class="form-group">
                          <label class=" control-label" for="image">Item Image:</label>
                          
                            <input type="file" class="form-control" id="image" name="image" placeholder="Select Image">
                          
                        </div>

                        <!-- <div class="form-group">
                          <label class=" control-label" for="password">Confirm Password:</label>
                           
                            <input type="password" class="form-control" id="comfirmPassword" name="confirmPassword" required="required"  placeholder="Re-enter password">
                        
                        </div> -->

                        <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
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