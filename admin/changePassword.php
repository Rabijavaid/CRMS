<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />

<link rel="stylesheet" type="text/css" href="css/changePassord.css" />
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
  <li><input class="form-control" type="text" required="required" id="id" placeholder="Enter Officer Id..."></li>
  <li><input class="form-control" type="text" id="password" placeholder="New Password Show Here..."></li>
  <li><input class="form-control btn btn-info" id="generate" type="button" name="generate" value="Generate"></li>
</ul>
<!--     DETAIL    !-->
 
</div>

</body>

</html>

<script type="text/javascript">
$(document).ready(function(){

  $('#generate').click(function(e){
    var id = $('#id').val();
    if (id == '') {
      alert("Enter ID First !")
    }else{

    $.ajax({
      url:"changePassord2.php",
      method:"POST",
      data:{id:id},
      success:function(data){
      if (data == 1) {
        alert("Enter Correct ID!")
      }else if (data != 1) {
        $('#password').val(data);
      }
      }
    });

      
    }
  });
});
</script>