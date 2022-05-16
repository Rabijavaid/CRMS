<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>

<link rel="stylesheet" type="text/css" href="css/changeemail.css" />
<!--  fonts style sheet   !-->
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<!--  bootstrap   !-->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<!--  jquery file   !-->
<script src="../bootstrap/jquery.min.js"></script>


<body>

<?php include "sessionConfirm.php" ?>


<?php include "side-bar.php" ?>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">

<!--  header include    !-->

<?php include "header.php" ?>


<ul class="password">
  <form id="myform">
  <li><input class="form-control" type="text" id="oldEmail" placeholder="Enter Old Email..." /></li>
  <li><input class="form-control" type="text" id="newMail" placeholder="Enter New Email ..." /></li>
  <li><input class="form-control" type="text" id="confirm" placeholder="Confirm New Email ..."/></li>
  <li><input class="form-control btn btn-info" id="generate" type="submit" name="generate" value="Change"></li>
  </form>
</ul>
<!--     DETAIL    !-->
 
</div>

</body>

</html>

<script type="text/javascript">
$(document).ready(function(){

var validation = "";

$("#oldEmail").blur(function(e){
var Email =$("#oldEmail").val();

      $.ajax({
      url:"cheakEmail2.php",
      method:"POST",
      data:{email:Email},
      success:function(data){
      if(data == 1) {
        validation = 1;
      }else if(data == 2){
        alert("Incorrect Email,Cheak Your Email!");
      }
      }
    });
});

$("#generate").click(function(e){
  e.preventDefault();
  var Email =$("#oldEmail").val();
  var newEmail =$("#newMail").val();
  var confirmEmail =$("#confirm").val();

  if (validation == 1) {
  if (newEmail === confirmEmail) {
    $.ajax({
      url:"updateEmail.php",
      method:"POST",
      data:{email:newEmail,oldEmail:Email},
      success:function(data){
        alert(data);
        document.getElementById('myform').reset();
      }
    });


  }else{
    alert("New Email Cannot Matched !")
  }
}else{
  alert("Incorrect Email,Cheak Your Email!")
}
});

});
</script>