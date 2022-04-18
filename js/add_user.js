$(document).ready(function(){
	$("#save_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var firstname = $("#firstname").val();
		var middlename = $("#middlename").val();
		var lastname = $("#lastname").val();
		var section = $("#section").val();
		$.ajax({
			type: "POST",
			url: "add_user.php",
			data: {
				Usuario: username,
				Contraseña: password,
				Nombre: firstname,
				Segundo Nombre: middlename,
				Apellidos: lastname,
				section: section
			},
			success: function(msg){
				$("#a").html(msg);
				$("#a").fadeIn();
				$("#a").fadeOut(2000);
				$("#form_user input").val("");
				setTimeout(function(){
					$("#add").slideUp(2000);
					window.location = "user.php";
				}, 1000);
			},
			error: function(){
				aler("Error!");
			}
		});
	});
});