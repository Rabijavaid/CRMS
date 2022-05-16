<!DOCTYPE html>
<html>
<head>
	<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />

<body>
<div class="login">
	<h1> LOGIN </h1>
		<div class="inputContainer">
			<i class="far fa-user" ></i>
			<input type="text" name="USERNAME" id="username" placeholder="username" required="required" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
		</div>

		
		<div class="inputContainer" >
			<i class="fas fa-lock"></i>
			<input type="password" name="password" id="password" placeholder="password" required="required" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
		</div>
		<div id="alertBox" style="color:#fff;background-color: red;width: 100%;text-align: center;font-weight: 500;"></div>
		<input class="btn btn-block btn-primary" type="submit" id="login" value="LOGIN" />
		
		<span> don't have account ? <a href="signup.php" >SIGN UP</a></span>
		<span> Forget Password ? <a href="forget.php" >Reset</a></span>
</div>



</body>
<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript">

	function newFunction(element){
	  element.closest(".inputContainer").style.borderBottomColor = '#007bff';
	  element.closest("div").style.color = '#0080ff';
	};

	function blurfunction(element) {
		
	  element.closest(".inputContainer").style.borderBottomColor = '#eee';
	  element.closest("div").style.color = '#000';
	};



$(document).ready(function(){
	$('#login').click(function(e){
		e.preventDefault();
		var user_name= $("#username").val();
		var user_password= $("#password").val();
		e.preventDefault();
		if (user_name == "" || user_password== "") {
			alert("fill all fields");
		}else{
			
		$.ajax({
			url:"confirmLogin.php",
			method:"POST",
			data:{name:user_name,password:user_password},
			success:function(data){
				if (data!=1) {
				window.location.assign(data);
				}else{
					document.getElementById("alertBox").innerHTML = "invalid username or password";
				}
			}
		});
		}
	});
});
</script>


</html>