<?php 
include 'admin-header.php';
// $page_id="";
// $page_top_id="home";
include 'db-operations.php';
// $numBorrowers=getUserCount('borrower');
// $numLenders=getUserCount('lender');
// $numLoans=getLoanCount();

$numSalesman = getSalesmanCount();
$numItem = getItemCount();
$id = $_SESSION['user_id'];
$name = getSalesmanName($id);
$numParty = getPartyCount();
?>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Manage Party, Salesmans & Items!</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title"><i class="fa fa-user-circle"></i> Salesman</h3>
             <p>HI !<?php echo ' '.$name; ?> .</p>
              <p class="mt-40 mb-20">

                <a class="btn btn-info icon-btn mr-10" href="edit-salesman.php?id=<?php echo $id; ?>" ><i class="fa fa-list"></i> Edit Profile </a>
              </p>
            </div>
          </div>
          <div class="col-md-6">
           <div class="card">
              <h3 class="card-title"><i class="fa fa-user-circle-o"></i> Item </h3>
              <p>There are <?php echo $numItem; ?> items in the system.</p>
              <p class="mt-40 mb-20"><a class="btn btn-primary icon-btn mr-10" href="add-item.php" ><i class="fa fa-user-plus"></i> Add Item </a><a class="btn btn-info icon-btn mr-10" href="all-item.php" ><i class="fa fa-list"></i> View All Item  </a></p>
            </div>
          </div>
          <div class="col-md-6">
           <div class="card">
              <h3 class="card-title"><i class="fa fa-money"></i> Manage Party</h3>
              <p>There are <?php echo $numParty; ?> manages party in the system.</p>
              <p class="mt-40 mb-20"><a class="btn btn-primary icon-btn mr-10" href="add-party.php" ><i class="fa fa-plus"></i> Add Party</a><a class="btn btn-info icon-btn mr-10" href="all-party.php" ><i class="fa fa-list"></i> View All Party</a></p>

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