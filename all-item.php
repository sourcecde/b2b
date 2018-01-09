<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";
?>
<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Are you sure you want to delete this item?'))
     {
        window.location.href='delete-item.php?id='+id;
     }
}

</script>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-list"></i> All Items</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">All Items</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Description</th>                      
                      <th>Quantity</th>
                      <th>Category</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include 'db-operations.php';
                  $items=getItems();
                  for ($i=0;$i<count($items);$i++)
                  {
                    if ($items[$i]['isdeleted'] == 'N'){
                       echo "<tr>";
                      echo "<td>" . $items[$i]['name'] . "</td>";
                      echo "<td>" . $items[$i]['image'] . "</td>";
                      echo "<td>" . $items[$i]['description'] . "</td>";
                      echo "<td>" . $items[$i]['quantity'] . "</td>";
                      echo "<td>" . $items[$i]['category'] . "</td>";
                      echo "<td>";
                      echo "<div class='btn-group'>";

                      echo "<a class='btn btn-primary btn-sm' href='view-item.php?id=" . $items[$i]['id'] . "'><i class='fa fa-edit'></i> View</a>";
                      echo "<a class='btn btn-primary btn-sm' href='edit-item.php?id=" . $items[$i]['id'] . "'><i class='fa fa-edit'></i> Edit</a>";
                      echo "<a class='btn btn-primary btn-sm' href='javascript:delete_id(" . $items[$i]['id'] . ")'><i class='fa fa-edit'></i> Delete</a>";

                      // if($items[$i]['isblocked'] == 'N'){
                      //   $button = "Inactive";
                      // }else{
                      //    $button = "Active";
                      // }

                      // $button = "Active";

                      // echo "<a class='btn btn-primary btn-sm' href='delete-item.php?item_id=" . $items[$i]['id'] . "&isblocked=".$items[$i]['isblocked']."'><i class='fa fa-edit'></i> ".$button."</a>";
                      echo "</div>";
                      echo "</td>";
                      echo "</tr>";
                    }
                   
                  }
                  ?>
      
                   
                   
                  </tbody>
                </table>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
<?php 
include 'admin-footer.php';
?>