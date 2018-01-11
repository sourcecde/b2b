<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "readCountry.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


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
<?php
  if (isset($_GET['search_button']) && $_GET['search_button'] !=  ""){
    $search_key = $_GET['search_key'];
    $search_category = $_GET['search_category'];

    $search_values = search($search_key,$search_category);

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

               
                   <form id="orderFrom"  role="form" method="post" action="add-order.php">

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
                              <?php for ($i=0;$i<3;$i++) {?>
                              <tr>
                                <td>

                                  <input type="text" hidden="true" id="order_item_id" name="order_item_id[]" value="<?php echo $i; ?>"/>

                                  <input type="text" class="form-control" id="order_item_name" name="order_item_name[]" value="<?php echo 'Item name'; ?>" readonly></td>

                                <td>
                                  <input type="text" class="form-control"  value="1">
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>

                  </form>
               </div>
               <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('orderFrom').submit();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Order</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
               
                   <form id=""  role="form" method="GET" action="">

                        <div class="form-group ">
                            <input type="text" class="form-control" id="search-box" name="search_key" placeholder="Search" autocomplete="off">
                            <div id="suggesstion-box"></div>
                        </div> 



                        <div class="form-group">
                          <label class=" control-label" for="category">Category:</label>
                          <select class="form-control" id="category" name="search_category" placeholder="select Category">
                            <option value="">Select Category</option>
                            <option value="all">All</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                          </select>
                        </div>

                        <input type="submit" name="search_button" class="btn btn-primary icon-btn" value="Search">
                  </form>
               </div>

               

               <!-- <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-0">
                    <button class="btn btn-primary icon-btn" onclick="document.getElementById('addBorrowerForm').submit();" type="button">Search</button>
                  </div>
                </div>
              </div> -->

              <hr>
               <table class="table table-hover table-bordered" id="sampleTable">
                  <tbody>

                    <?php if(isset($search_values) && $search_values!=0){?>
                    <?php for ($i=0;$i<count($search_values);$i++) {?>
                    <tr>
                      <td><?php echo $search_values[$i]['name']; ?></td>
                      <td>
                        <button class="btn btn-primary col-md-offset-9" id="itemAdd" type="button" onclick="return itemAdd('<?php echo $search_values[$i]['id']; ?>');">Add</button>
                      </td>
                    </tr>
                    <?php }} ?>
                      <!-- Ohh, Sorry! No Result Found!!! -->
                   
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

<script type="text/javascript">
function itemAdd(id)
{
	alert(id);
}
</script>


