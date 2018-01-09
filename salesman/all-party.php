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
        window.location.href='delete-party.php?id='+id;
     }
}

</script>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-list"></i> All Party</h1>
            <p>Manage Party, Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">All Party</a></li>
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
                      <th>City</th>                      
                      <th>State</th>
                      <th>Pin</th>
                      <th>GSTIN</th>
                      <th>Mobile No</th>
                      <th>Office No</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include 'db-operations.php';
                  $party=getAllParty();
                  for ($i=0;$i<count($party);$i++)
                  {
                      echo "<tr>";
                      echo "<td>" . $party[$i]['name'] . "</td>";
                      echo "<td>" . $party[$i]['address'] . "</td>";
                      echo "<td>" . $party[$i]['city'] . "</td>";
                      echo "<td>" . $party[$i]['state'] . "</td>";
                      echo "<td>" . $party[$i]['pin'] . "</td>";
                      echo "<td>" . $party[$i]['gstin'] . "</td>";
                      echo "<td>" . $party[$i]['mobile_no'] . "</td>";
                      echo "<td>" . $party[$i]['office_no'] . "</td>";
                      echo "<td>";
                      echo "<div class='btn-group'>";

                      echo "<a class='btn btn-primary btn-sm' href='edit-party.php?id=" . $party[$i]['id'] . "'><i class='fa fa-edit'></i> Edit</a>";
                      echo "<a class='btn btn-primary btn-sm' href='view-party.php?id=" . $party[$i]['id'] . "'><i class='fa fa-edit'></i> View</a>";
                      
                       
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
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
<?php 
include 'admin-footer.php';
?>