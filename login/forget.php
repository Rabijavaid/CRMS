<!DOCTYPE html>
<html>
<head>
	<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/forget.css"/>
<body>

<div class="elelment">
	<h2>CRIMINAL RECORD MANAGMENT SYSTEM</h2>
	<div class="element-main">
		<h1>Forgot Password</h1>
		<p> New Password will be Send On Your Email.</p>
		<form id="forgetForm">
			<input type="text" id="email" placeholder="Your e-mail address" class="form-control" style="margin-bottom: 10px;" />
			<input type="submit" id="reset" value="Send Email" class="btn btn-primary" style="margin: 0px auto;display: block;" />
		</form>
	
		<div id="message" style="margin-top: 15px;text-align: center;"></div>
</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	$('#reset').click(function(e){
		e.preventDefault();

		$("#message").html('<div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">Sending Mail ...		  		 </div>		</div>');

		var email = $("#email").val();
		$.ajax({
			url:"mail/mail.php",
			method:"POST",
			data:{email:email},
			success:function(data){
				$("#message").html("<span padding: 10px 20px;font-size: large;  font-family: serif;color: white;background-color: #006f0e;> Email Send successfully ! </span>");
			}
		});
	});
});
</script>