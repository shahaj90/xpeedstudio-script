function readUser() {
    $('#userTable').DataTable({
        responsive: true,
        "ajax": {
            url: baseUrl + "/ReadUsers",
            type: 'POST'
        },
        "columns": [

        {
            "data": "id",
            "render": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "name" },
        { "data": "email" },
        { "data": "mobile" },
        {
            "data": "status",
            "render": function(data, type, row, meta) {
                var response = 'Inactive';
                if (data == 1) {
                    response = 'Active';
                }

                return response;
            }
        },
        {
            "data": "status",
            "render": function(data, type, row, meta) {
                var buttons = `<div class="btn-group m-btn-group" role="group">
                <button type="button" class="btn btn-warning btn-sm" onclick='updateUserModal(` + row.id + `)'>Update</button>
                <button type="button" class="btn btn-danger btn-sm" onclick='deleteUser(` + row.id + `)'>Delete</button>
                </div>`;

                return buttons;
            }
        },
        ],
    });

}

function addUserModal() {
    $("#registerAddFrom")[0].reset();
    $("#registerAddFrom").validate().destroy();
    $("input").removeClass('is-invalid');
    $("select").removeClass('is-invalid');
    $("input").removeClass('is-valid');
    $("select").removeClass('is-valid');
    $("#addMessageDiv").hide();
    $("#addUserModal").modal({
        backdrop: 'static'
    });
}

function registerUser() {
    $("#registerAddFrom").validate({
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
        name: "required",
        email: {
          required: true,
          email: true
      },
      mobile: "required",
      password: "required",
      status: "required",
  },
  messages: {
    // name: "Please specify your name",
    email: {
      // required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
  }
},

submitHandler: function(form) {
    $.ajax({
        type: "POST",
        url: baseUrl + "/RegisterUser",
        data: $('#registerAddFrom').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status == 'success') {
                swal("Register!", response.message, response.status);
                $("#addUserModal").modal('hide');
                $('#userTable').DataTable().ajax.reload(null, false);
            } else {
                $("#addMessage").html(response.message);
                $("#addMessageDiv").show();
            }
        }
    });
}
});
}

function updateUserModal(id) {
 $("#registerAddFrom").validate().destroy();
 $("input").removeClass('is-invalid');
 $("select").removeClass('is-invalid');
 $("input").removeClass('is-valid');
 $("select").removeClass('is-valid');
 $("#updateMessageDiv").hide();

 $.ajax({
    type: "GET",
    url: baseUrl + "/GetSingleUser",
    data: {id:id},
    dataType: 'json',
    success: function(response) {
        if (response.status == 'success') {
            $("#id").val(response.data.id);
            $("#name").val(response.data.name);
            $("#email").val(response.data.email);
            $("#mobile").val(response.data.mobile);
            $("#status").val(response.data.status);
            $("#updateUserModal").modal({
                backdrop: 'static'
            });

        } else {
            swal("Error!", response.message, response.status);
        }
    }
});

}

function updateUser() {
    $("#updateAddFrom").validate({
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
        name: "required",
        email: {
          required: true,
          email: true
      },
      mobile: "required",
      // password: "required",
      status: "required",
  },
  messages: {
    // name: "Please specify your name",
    email: {
      // required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
  }
},

submitHandler: function(form) {
    $.ajax({
        type: "POST",
        url: baseUrl + "/UpdateUser",
        data: $('#updateAddFrom').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status == 'success') {
                swal("Updated!", response.message, response.status);
                $("#updateUserModal").modal('hide');
                $('#userTable').DataTable().ajax.reload(null, false);
            } else {
                $("#updateMessage").html(response.message);
                $("#updateMessageDiv").show();
            }
        }
    });
}
});
}

function deleteUser(id) {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: baseUrl + "/DeleteUser",
                data: {id: id},
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        swal("Deleted!", response.message, response.status);
                        $('#userTable').DataTable().ajax.reload(null, false);
                    } else {
                        swal("Error!", response.message, response.status);
                    }
                }
            });
        }
    })
}