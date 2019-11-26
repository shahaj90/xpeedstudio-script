  <?php require_once('include/head.php');?>
  <?php require_once('include/navbar.php');?>

  <!-- Breadcrumb-->
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Buyer</li>
      </ul>
    </div>
  </div>

  <section>
    <div class="container-fluid">
      <!-- Page Header-->
      <header> 
        <h1 class="h3 display">Buyer List</h1>
      </header>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary">Add New</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="buyerTable">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Amount</th>
                      <th>Buyer</th>
                      <th>Receipt ID</th>
                      <th>Items</th>
                      <th>Email</th>
                      <th>IP</th>
                      <th>Note</th>
                      <th>City</th>
                      <th>Phone</th>
                      <th>Hash Key</th>
                      <th>Created</th>
                      <th>Created By</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php require_once('include/footer.php');?>
<?php require_once('include/foot.php');?>

<script type="text/javascript">
  $(function(){
    readBuyers();
  });
</script>
