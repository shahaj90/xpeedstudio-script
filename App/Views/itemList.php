  <?php require_once('include/head.php');?>
  <?php require_once('include/navbar.php');?>

  <!-- Breadcrumb-->
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Item List</li>
      </ul>
    </div>
  </div>

  <section>
    <div class="container-fluid">
      <!-- Page Header-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4>Item List</h4>
            </div>
            <div class="card-body">
              <div class="alert" id="itemListSearchMessage"></div>

              <form class="form-inline" id="itemListSearchForm">
                <div class="form-group">
                  <input id="from_date" type="text" name="from_date" placeholder="From Date" class="mr-3 form-control" readonly>
                </div>
                <div class="form-group">
                  <input id="to_date" type="text" name="to_date" placeholder="To Date" class="mr-3 form-control" readonly>
                </div>
                <div class="form-group">
                  <input id="user_id" type="text" placeholder="User ID" class="mr-3 form-control" name="user_id">
                </div>

                <div class="form-group">
                  <input type="submit" value="Search" class="mr-3 btn btn-primary" onclick="searchIteams()">
                </div>
              </form>

              <br>

              <div class="table-responsive" id="reportTableStatus">
                <table class="table table-striped" id="itemSearchTable">
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
      $('#from_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose:true
      });

      $('#to_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose:true
      });
    })
    
  </script>
