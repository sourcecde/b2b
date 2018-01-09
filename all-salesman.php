<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="borrowers";
?>
<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Are you sure you want to delete?'))
     {
        window.location.href='delete-salesman.php?id='+id;
     }
}

</script>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-list"></i> All Salesman</h1>
            <p>Manage Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">All Salesmans</a></li>
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
                      <th>Address</th>
                      <th>Phone</th>                      
                      <th>DOB</th>
                      <th>Gender</th>
                      <th>Username</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include 'db-operations.php';
                  $salesmans=getSalesmans();
                  for ($i=0;$i<count($salesmans);$i++)
                  {
                      echo "<tr>";
                      echo "<td>" . $salesmans[$i]['name'] . "</td>";
                      echo "<td>" . $salesmans[$i]['address'] . "</td>";
                      echo "<td>" . $salesmans[$i]['mobile'] . "</td>";
                      echo "<td>" . $salesmans[$i]['dob'] . "</td>";
                      echo "<td>" . $salesmans[$i]['gender'] . "</td>";
                      echo "<td>" . $salesmans[$i]['username'] . "</td>";
                      echo "<td>";
                      echo "<div class='btn-group'>";

                      echo "<a class='btn btn-primary btn-sm' href='edit-salesman.php?id=" . $salesmans[$i]['id'] . "'><i class='fa fa-edit'></i> Edit</a>";
                      echo "<a class='btn btn-primary btn-sm' href='javascript:delete_id(" . $salesmans[$i]['id'] . ")'><i class='fa fa-edit'></i> Delete</a>";
                       echo "<a class='btn btn-primary btn-sm' href='delete-salesman.php?id=" . $salesmans[$i]['id'] . "'><i class='fa fa-edit'></i> Active</a>";
                      echo "</div>";
                      echo "</td>";
                      echo "</tr>";
                    
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