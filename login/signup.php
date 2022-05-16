<!DOCTYPE html>
<html>
<head>
	<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<link rel="stylesheet" type="text/css" href="css/signup.css" />
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<body>
<div class="login">
	<h1> SIGN UP </h1>
<form id="myform">	
	<div class="inputContainer">
		<i class="far fa-user"></i>
		<input type="text" id="name" name="NAME" placeholder="name" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>
	
	<div class="inputContainer">
		<i class="far fa-envelope"></i>
		<input type="text" id="email" name="EMAIL" id="email" placeholder="EMAIL" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>
	<span style="color:red;" id="emailCheak"></span>
	<div class="inputContainer">
		<i class="fas fa-id-card"></i>
		<input type="text" id="cnic" name="CNIC" maxlength="15" placeholder="CNIC" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>
	
	<div class="inputContainer">
		<i class="fas fa-phone-alt"></i>
		<input type="text" id="contact" name="CONTACT NO " maxlength="11" placeholder="contact no " onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>

	<div class="inputContainer">
		<i class="fas fa-lock"></i>
		<input type="password" id="password" name="password" placeholder="password" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>
	
	<div class="inputContainer">
		<i class="fas fa-lock"></i>
		<input type="password" id="confirm" name="CONFIRM PASSWORD" placeholder="confirm password" onFocus="newFunction(this)" onBlur="blurfunction(this)"/>
	</div>
	<span style="color:red; "id="err" ></span>

	<input class="btn btn-block btn-primary" type="submit" id="signUp" name="login" value="SIGN UP" />

	<span> already have account ? <a href="login.php" >LOGIN</a></span>

</form>
</div>
</body>
<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

function newFunction(element){
  element.closest(".inputContainer").style.borderBottomColor = '#007bff';
  element.closest("div").style.color = '#0080ff';
};

function blurfunction(element) {
	
  element.closest(".inputContainer").style.borderBottomColor = '#eee';
  element.closest("div").style.color = '#000';
};
var cheakMail='';
  $("#email").blur(function(e){
    var email = $('#email').val();
    $.ajax({
      url:"cheakEmail.php",
      method:"POST",
      data:{email:email},
      success:function(data){

     if(data == 1) {
          $('#emailCheak').html("EMAIL EXIST IN RECORD,CANNOT ADD THIS RECORD .");
          cheakMail= 1;
        }else if(data ==2) {
          $('#emailCheak').html('');
          cheakMail= 2;
        }
        else if(data ==3) {
          $('#emailCheak').html("EMAIL FORMAT IN NOT VALID.");
          cheakMail= 3;
        }
        
      }
  });
  });

$("#signUp").click(function(e){
	e.preventDefault();
	if (cheakMail == 1 || cheakMail == 3) {
		alert("CANNOT INSERT THIS RECORD . ");
	}else{
		var name = $('#name').val();
		var email = $('#email').val();
		var cnic = $('#cnic').val(); 
		var contact = $('#contact').val();
		var password = $('#password').val();
		var confirm = $('#confirm').val();

		if (name == "" || email == "" || cnic == "" || contact == "" || password == "") {
			alert("FILL ALL FEILDS .");

		}else if (password != confirm) {
			$("#err").html("PASSWORD NOT MATCHED.");
		}else{
			$.ajax({
				url:"signUpData.php",
				method:"POST",
				data:{name:name,email:email,cnic:cnic,contact:contact,password:password},
				success:function(data){
					$("#myform").trigger("reset");
				}
			});
		}
	}
});



</script>




</html>