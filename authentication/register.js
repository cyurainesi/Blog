

$(document).ready(function () {
	$(".logined").on("click", function (e) {
		e.preventDefault();

		var username=$("#username").val();
		var phone=$("#phone").val();
		var email=$("#email").val();
		var password=$("#password").val();
		if (username == "") {
				$(".messagern").html("Enter username or email")
		}else{


			if(email == ""){
				$(".messagern").html("Enter user email")
			}else{
				if (phone == "") {
					$(".messagern").html("Enter user phone number")
				}else{
								
						if (password == "") {
			 				  $(".messagern").html("Enter user password")
						}else{ 

							$.ajax({
								url:"c_chat/signup.php",
								method: "POST",
								data:{
									username:username,
									email:email,
									phone:phone,
									password: password

								},
								success: function (data) { 
									$(".messagern").html(data)
									if (data.indexOf('success') >= 0) {
										window.location="login.php";
									}
									
								},
								dataType:"text"

							});

						}

				}

			}

			
		}
	});
});