
$("#loginMessageDiv").hide();
function checkLogin() {
	$("#loginFrom").validate({
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
			email: {
				required: true,
				email: true
			},
			password: "required",
		},
		messages: {
			email: {
				email: "Your email address must be in the format of name@domain.com"
			},
		},

		submitHandler: function(form) {
			$.ajax({
				type: "POST",
				url: baseUrl + "/CheckLogin",
				data: $('#loginFrom').serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.status == 'success') {
						$("#loginMessage").removeClass( "alert-danger" ).addClass( "alert-success" );
						$("#loginMessage").html(response.message);
						$("#loginMessageDiv").show();

					} else {
						$("#loginMessage").removeClass( "alert-success" ).addClass( "alert-danger" );
						$("#loginMessage").html(response.message);
						$("#loginMessageDiv").show();
					}
				}
			});
		}
	});
	
}