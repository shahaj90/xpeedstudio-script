  <?php require_once('include/head.php');?>
  <?php require_once('include/navbar.php');?>

  <!-- Breadcrumb-->
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">User</li>
      </ul>
    </div>
  </div>

  <section>
    <div class="container-fluid">
      <!-- Page Header-->
      <header> 
        <h1 class="h3 display">User List</h1>
      </header>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" onclick="addUserModal()">Add New</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="userTable">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th width="50">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Add modal -->
        <div class="modal fade" id="addUserModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <form class="text-left" id="registerAddFrom" novalidate>
                <div class="modal-body"> 
                  <div id="addMessageDiv">
                    <div class="alert alert-danger" id="addMessage"></div>
                  </div>                   

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Write name" name="name" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email Address" name="email" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Write password" name="password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" placeholder="Write Mobile Number" name="mobile" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="2">InAction</option>
                    </select>
                  </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <div class="form-group">
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Register" onclick="registerUser()">
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

        <!-- Update modal -->
        <div class="modal fade" id="updateUserModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <form class="text-left" id="updateAddFrom" novalidate>
                <div class="modal-body"> 
                  <div id="updateMessageDiv">
                    <div class="alert alert-danger" id="updateMessage"></div>
                  </div>                   

                  <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" id="id" name="id" class="form-control">
                    <input type="text" placeholder="Write name" id="name" name="name" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email Address" id="email" name="email" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Write password" id="password" name="password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" placeholder="Write Mobile Number" id="mobile" name="mobile" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status">
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="2">InAction</option>
                    </select>
                  </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <div class="form-group">
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update" onclick="updateUser()">
                  </div>
                </div>

              </form>

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
      readUser();
    });
  </script>
