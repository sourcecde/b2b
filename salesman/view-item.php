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
    $item=getItemDetails($id);
    $image_name = getImageName($id);

    $name=$item['name'];
    $image=$item['image'];
    $description=$item['description'];
    $quantity=$item['quantity'];
    $category=$item['category'];
}
?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Edit Salesman</h1>
            <p>Manage Salesman & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Edit Salesman</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Edit Salesman Details</h3>
              <div class="card-body">

                  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>
               
                   <form id="editBorrowerForm"  role="form" method="post" action="edit-item.php">
  
                        
                       <div class="form-group">
                          <label class=" control-label" for="name">Name:</label>
                          
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="quantity">Quantity:</label>
                          
                            <input type="text" class="form-control" id="quantity" required="required" name="quantity" placeholder="Enter quantity" value="<?php echo $quantity; ?>" readonly>
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="category">Category:</label>
                          <select class="form-control" id="category" name="category" placeholder="select Category" value="<?php echo $category; ?>" readonly>
                            <option value="">Select Category</option>
                            <option value="option1" <?php if($category == "option1"){?> selected="selected" <?php }?>>Option 1</option>
                            <option value="option2" <?php if($category == "option2"){?> selected="selected" <?php }?>>Option 2</option>
                            <option value="option3" <?php if($category == "option3"){?> selected="selected" <?php }?>>Option 3</option>
                          </select>
                        </div>


                        <div class="form-group">
                          <label class="control-label">Description:</label>
                          <textarea class="form-control" rows="4" id="description" name="description" placeholder="Item Description" readonly><?php echo $description; ?></textarea>
                        </div>

                         <div class="form-group">
                          <label class=" control-label" for="image">View Image:</label>
                          
                            <img src="../item_images/<?php echo $image_name; ?>" class="form-control">
      
                        </div>
                        <!-- <div class="form-group">
                          <label class=" control-label" for="password">Confirm Password:</label>
                           
                            <input type="password" class="form-control" id="comfirmPassword" name="confirmPassword" required="required"  placeholder="Re-enter password">
                        
                        </div> -->
                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="window.location.href='<?php echo "edit-item.php?id=".$id; ?>';" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>&nbsp;&nbsp;&nbsp;
                  </div>
                </div>
              </div>
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