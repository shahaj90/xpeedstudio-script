function checkCountryCode() {
  if ($("#phone").val() > 0) {
    $('#country').val('880')  
  }else{
    $('#country').val('')
  }  
}

$("#addMessage").hide();
function saveItem() {
  // Custom role
  jQuery.validator.addMethod("letterSpaceOnly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
  }, "Letter and space only allow"); 

  jQuery.validator.addMethod("letterSpaceNumberOnly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
  }, "Letter, text and space only allow"); 

  jQuery.validator.addMethod("letterOnly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
  }, "Text only allow"); 


  $("#addItemForm").validate({
   errorElement: "div",
   errorClass: 'is-invalid',
   validClass: 'is-valid',
   ignore: ':hidden:not(.summernote),.note-editable.card-block',
   errorPlacement: function (error, element) {
    error.addClass("invalid-feedback");
    if (element.prop("type") === "checkbox") {
      error.insertAfter(element.siblings("label"));
    } 
    else {
      error.insertAfter(element);
    }
  },
  rules: {
    amount: {
      required: true,
      number: true
    },
    buyer: {
      required: true,
      letterSpaceNumberOnly:true,
      maxlength:20
    },
    receipt_id: {
      required: true,
      letterOnly:true
    },
    "items[]": {
      required: true,
      letterOnly:true
    },
    buyer_email: {
      required: true,
      email: true
    },
    note: {
      required: true,
      maxlength:30
    },
    city: {
      required: true,      
      letterSpaceOnly: true
    },
    phone: {
      required: true,
      number: true
    },
    entry_by: {
      required: true,
      number: true
    },
  },

  submitHandler: function(form) {
    $.ajax({
      type: "POST",
      url: baseUrl + "/SaveItem",
      data: $('#addItemForm').serialize(),
      dataType: 'json',
      success: function(response) {
        if (response.status == 'success') {
          $("#addItemForm")[0].reset();
          $("#addItemForm").validate().destroy();
          $("input").removeClass('is-invalid');
          $("select").removeClass('is-invalid');
          $("input").removeClass('is-valid');
          $("select").removeClass('is-valid');
          $( "#addMessage" ).removeClass( "alert-danger" ).addClass( "alert-success" );
        } else {
          $( "#addMessage" ).removeClass( "alert-success" ).addClass( "alert-danger" );
        }

        $("#addMessage").html(response.message);
        $("#addMessage").show();
      }
    });
  }
});
}


$("#itemListSearchMessage").hide();
$("#reportTableStatus").hide();
function searchIteams() {
  $("#itemListSearchForm").validate({
   errorElement: "div",
   errorClass: 'is-invalid',
   validClass: 'is-valid',
   ignore: ':hidden:not(.summernote),.note-editable.card-block',
   errorPlacement: function (error, element) {
    error.addClass("invalid-feedback");
    if (element.prop("type") === "checkbox") {
      error.insertAfter(element.siblings("label"));
    } 
    else {
      error.insertAfter(element);
    }
  },
  rules: {},

  submitHandler: function(form) {
    $('#itemSearchTable').DataTable({
      "responsive": true,
      "destroy":true,
      "ajax": {
        url: baseUrl + "/SearchItems",
        type: 'POST',
        data: {
          from_date: $("#from_date").val(),
          to_date: $("#to_date").val(),
          user_id: $("#user_id").val(),
        },
      },
      "columns": [
      {
        "data": "id",
        "render": function(data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      { "data": "amount" },
      { "data": "buyer" },
      { "data": "receipt_id" },
      { 
        "data": "items",
        "render": function(data, type, row, meta) {
          var data = JSON.parse(data);
          var items = '';
          for (var i = 0; i < data.length; i++) {
            items += data[i] + ", ";
          }

          return items.slice(0, -2);
        }
      },
      { "data": "buyer_email" },
      { "data": "buyer_ip" },
      { "data": "note" },
      { "data": "city" },
      { "data": "phone" },
      { "data": "hash_key" },
      { "data": "entry_at" },
      { "data": "entry_by" }
      ]
    });

    $("#reportTableStatus").show();




    // $.ajax({
    //   type: "POST",
    //   url: baseUrl + "/SearchItems",
    //   data: $('#itemListSearchForm').serialize(),
    //   dataType: 'json',
    //   success: function(response) {
    //     if (response.status == 'success') {
    //       $("#itemListSearchMessage").hide();
    //       $("#reportTableStatus").show();
    //     } else {
    //       $( "#itemListSearchMessage" ).removeClass( "alert-success" ).addClass( "alert-danger" );
    //     }

    //     $("#itemListSearchMessage").html(response.message);
    //     $("#itemListSearchMessage").show();
    //   }
    // });
  }
});  
  
}

function getSearchResult() {
 $('#itemSearchTable').DataTable({
  "responsive": true,
  "ajax": {
    url: baseUrl + "/ReadBuyers",
    type: 'POST'
  },
  "columns": [

  {
    "data": "id",
    "render": function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }
  },
  { "data": "amount" },
  { "data": "buyer" },
  { "data": "receipt_id" },
  { "data": "items" },
  { "data": "buyer_email" },
  { "data": "buyer_ip" },
  { "data": "note" },
  { "data": "city" },
  { "data": "phone" },
  { "data": "hash_key" },
  { "data": "entry_at" },
  { "data": "entry_by" }
  ]
});
}
