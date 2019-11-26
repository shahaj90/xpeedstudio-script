  <?php require_once('include/head.php');?>
  <?php require_once('include/navbar.php');?>

  <!-- Breadcrumb-->
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Add Item</li>
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
              <h4>All New Item</h4>
            </div>
            <div class="card-body">
              <div class="alert" id="addMessage"></div>
              <form class="form-horizontal" id="addItemForm">
                <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="amount">
                  </div>
                </div>                
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Buyer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="buyer">
                  </div>
                </div>                
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Receipt_id</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="receipt_id">
                  </div>
                </div>                
                <div class="line"></div>

                <div class="form-group row field_wrapper">
                  <label class="col-sm-2 form-control-label">Items</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="items[]">                    
                  </div>
                  <div class="col-sm-1">
                    <a href="javascript:void(0);" class="add_button" title="Add field">
                      <i class="fa fa-plus-circle fa-2x"></i>
                    </a>
                  </div>
                </div>                
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Buyer_email</label>
                  <div class="col-sm-10">
                   <input type="email" class="form-control" name="buyer_email">
                 </div>
               </div>                
               <div class="line"></div>

               <div class="form-group row">
                <label class="col-sm-2 form-control-label">Note</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="note"></textarea>
                </div>
              </div>                
              <div class="line"></div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="city">
                </div>
              </div>                
              <div class="line"></div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Phone</label>
                <div class="col-sm-2">
                 <input type="text" class="form-control" id="country" readonly>
               </div>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="phone" name="phone" onkeypress="checkCountryCode()" onkeydown="checkCountryCode()" onkeyup="checkCountryCode()">
               </div>
             </div>                
             <div class="line"></div>

             <div class="form-group row">
              <label class="col-sm-2 form-control-label">Entry_by</label>
              <div class="col-sm-10">
               <input type="text" class="form-control" name="entry_by">
             </div>
           </div>                
           <div class="line"></div>
           <div class="form-group row">
            <div class="col-sm-4 offset-sm-11">
              <button type="submit" class="btn btn-primary" onclick="saveItem()">Save</button>
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
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row col-sm-12 offset-sm-2">'; 
    fieldHTML += '<input type="text" class="form-control col-sm-9" name="items[]">'; 
    fieldHTML += '<a href="javascript:void(0);" class="remove_button col-sm-1" title="Remove field">'; 
    fieldHTML += '<i class="fa fa-minus-circle fa-2x"></i>'; 
    fieldHTML += '</a>'; 
    fieldHTML += '</div>'; 

    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
          }
        });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });
  })
</script>
