

$(document).ready(function () {
	$(".logined").on("click", function (e) {
		e.preventDefault();

		var email_username=$("#email_username").val();
		var password=$("#password").val();
		if (email_username == "") {
				$(".messagern").html("Enter username or email")
		}else{


			if (password == "") {
 				  $(".messagern").html("Enter user password")
			}else{ 
				

				$.ajax({
					url:"c_chat/login.php",
					method: "POST",
					data:{
						username_email:email_username,
						password: password

					},
					success: function (data) { 
						$(".messagern").html(data)
						if (data.indexOf('success') >= 0) {
							window.location="home.php";
						}
						
					},
					dataType:"text"

				});

			}
			
		}
	});
});