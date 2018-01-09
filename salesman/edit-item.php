<?php 
include 'admin-header.php';
$page_id="";
$page_top_id="borrowers";

include 'db-operations.php';
$message="";
$display_message="none";
$message_type="alert-danger";

// $type="borrower";

if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=$_GET["id"];
    $item=getItemDetails($id);

    $name=$item['name'];
    $image=$item['image'];
    $description=$item['description'];
    $quantity=$item['quantity'];
    $category=$item['category'];

}

else if($_POST["name"]!="")
{
  $id=@$_POST["id"];
  $name=$_POST['name'];
    
    
    $quantity=$_POST['quantity'];
    $category=$_POST['category'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $display_message="block";

    $image = @$_FILES['image']['name'];
    $size = @$_FILES['image']['size'];
    $type = @$_FILES['image']['type'];
    $tmp_name = @$_FILES['image']['tmp_name'];

    $location = "item_images/";
    $maxsize = 10000000;

  // $message=editItemDetails($id,$name,$quantity,$categoty,$description,$image);
  // if($message)
  // {
  //   $message="<strong>SUCCESS!</strong> Item updated in the system!";
  //   $message_type="alert-success";
  // }
  // else
  // {
  //   $message="<strong>FAILURE!</strong> " . $message . "!";
  // }

//   if(isset($image) &!empty($image)){
//   if($type == "image/jpeg" && $size <= $maxsize){
//     if(move_uploaded_file($tmp_name, $location.$image)){
      
//         $message=editItemDetails($id,$name,$quantity,$category,$description,$image);

//           if($message)
//           {
//             $message="<strong>SUCCESS!</strong> Item upadated to the system!";
//             $message_type="alert-success";
//           }
//           else
//           {
//             $message="<strong>FAILURE!</strong> " . $message . "!";
//           }
//     }else{
//       echo "Failed to Upload";
//     }
//   }else{
//     echo "File should be jpeg image & only 100 kb in size";
//   }
// }
// else{
        $message=editItemDetails($id,$name,$quantity,$category,$description,$image);
        if($message)
        {
        $message="<strong>SUCCESS!</strong> Item updated in the system!";
        $message_type="alert-success";
        }
        else
        {
        $message="<strong>FAILURE!</strong> " . $message . "!";
        }
// }
}

?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-plus"></i> Edit Items</h1>
            <p>Manage Salesman & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Edit Items</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Edit Items Details</h3>
              <div class="card-body">

                  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in" style="display:<?php echo $display_message ?>">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $message ?>
                        </div>
               
                   <form id="editBorrowerForm"  role="form" method="post" action="edit-item.php" enctype="multipart/form-data">
  
                     <input type="text" hidden="true" id="id" name="id" value="<?php echo $id; ?>"/>
  
                        
                       <div class="form-group">
                          <label class=" control-label" for="name">Name:</label>
                          
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="quantity">Quantity:</label>
                          
                            <input type="text" class="form-control" id="quantity" required="required" name="quantity" placeholder="Enter quantity" value="<?php echo $quantity; ?>">
                          
                        </div>

                        <div class="form-group">
                          <label class=" control-label" for="category">Category:</label>
                          <select class="form-control" id="category" name="category" placeholder="select Category" value="<?php echo $category; ?>">
                            <option value="">Select Category</option>
                            <option value="option1" <?php if($category == "option1"){?> selected="selected" <?php }?>>Option 1</option>
                            <option value="option2" <?php if($category == "option2"){?> selected="selected" <?php }?>>Option 2</option>
                            <option value="option3" <?php if($category == "option3"){?> selected="selected" <?php }?>>Option 3</option>
                          </select>
                        </div>


                        <div class="form-group">
                          <label class="control-label">Description:</label>
                          <textarea class="form-control" rows="4" id="description" name="description" placeholder="Item Description" ><?php echo $description; ?></textarea>
                        </div>

                         <div class="form-group">
                          <label class=" control-label" for="image">Item Image:</label>
                          
                            <input type="file" class="form-control" id="image" name="image" placeholder="Select Image" value="<?php echo $image; ?>">
      
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
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('editBorrowerForm').submit();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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