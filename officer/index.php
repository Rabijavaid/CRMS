<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<!--  fonts style sheet   !-->
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<!--  search bar css   !-->
<link rel="stylesheet" type="text/css" href="css/search.css" />
<script src="../bootstrap/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>



<body>
<?php
include "config.php";
include "sessionConfirm.php" ;
?>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
<!--  header include    !-->

<?php include "header.php" ?>

<!--   search bar start    !-->

<form id="searchForm">
	<div class="searchMain">
			<div class="mainbuttons">
				<ul>
			    <li><input type="button" id="mainbtn" class="btn btn-primary" value="HOME" /></li>
 				<li><input type="button" class="btn btn-primary" value="CRIMINAL" />
  			    <ul class="dropdown">
  			    <li><input type="button" id="veiwCriminals" value="View" /></li>
  			    <li><input type="button"  data-target="#mymodel" data-toggle="modal" value="ADD" /></li>
 		    	</ul>
  			  	</li>
 			   	<li><input type="button" class="btn btn-primary" value="PROFILE" >
 			   	<ul class="dropdown">
  			    <li><input type="button" id="profileVeiw" value="view" /></li>
  			    <li><a href="changePassword.php" target="_blank"><input type="button" value="change Password" /></a></li>
  			    <li><a href="LogOut.php"><input type="button" value="LogOut" /></a></li>
 		    	</ul>
 			   	</li>

 			 	</ul>
			</div>	
			
			<div class="searchInput">
				<i class="fas fa-search" ></i>
				
				<input type="text" id="search" placeholder="SEARCH CRMS ..." oninput="closeSearch()" />
				
				<i class="fas fa-times" id="Searchclose" style="visibility: hidden;" onclick="resetForm()"></i>
			</div>
			<i class="fas fa-server" onclick="filters()" ></i>
			
	<!--     search filters   !-->
			<div id="filter">
				<input type="radio" id="r1" class="filters" name="filter" checked="checked" value="C_name"  /><label for="r1">NAME</label>
				<input type="radio" id="r2" class="filters" name="filter" value="C_cnic" /><label for="r2">CNIC</label>
				<input type="radio" id="r3" class="filters" name="filter" value="C_address" /><label for="r3">ADDRESS</label>
				<input type="radio" id="r4" class="filters" name="filter" value="C_status" /><label for="r4">STATUS</label>
				<input type="radio" id="r5" class="filters" name="filter" value="C_crime" /><label for="r5">crime</label>
			</div>
		
	</div>
</form>

<!--   search bar end    !-->


<!--    Main content start  -->
<div id="mainContent">

</div>
<!--    Main content end  -->

<!-----------------Popup modal for insert record !-------------------->
<!--    modal    !-->
<div class="modal fade" id="mymodel">
  <div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

<!--    modal header   !-->
      <div class="model-header">
        <h1 class="text-center text-primary ">ADD CRIMINAL</h1>
      </div>

<!--    image uploader    !-->
    <form name="addCriminal" id="myform">
      <div class="ml-2 col-sm-6" >
          <div id="msg">
          </div>
        
        <input type="file" name="img" class="file" accept="image/*" style="visibility: hidden;position ": absolute;>
        <div class="input-group my-3">
            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
            <div class="input-group-append">
                <button type="button" class="browse btn btn-primary">Browse...</button>
            </div>
          </div>

      </div>
      <div class="ml-2 col-sm-6">
        <img src="images/80x80.png" id="preview" class="img-thumbnail">
      </div>
      <input type="hidden" name="officerId" value="<?php echo $officerID ?>">
        <input type="text" class="form-control" id="name"  name="name"    style="margin-top:15px;" placeholder="Name..." />
        <input type="text" class="form-control" id="Fname" name="Fname"   style="margin-top:15px;" placeholder="F Name..." />
        <input type="text" class="form-control" id="Cnic"  name="Cnic"    style="margin-top:15px;" placeholder="CNIC..." maxlength="15" />

<!------------------SELCT BOX FOR crime SELECTION        !------------------>
		<select class="form-control" style="margin-top:15px;" id="Crime" name="Crime">
			<option selected disabled class="form-control">SELECT CRIME</option>
			<?php
				$sql = "SELECT * FROM `crime`";
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				
				echo '<option class="form-control" value="'.$row['crime_id'].'">'.$row['crime_name'].'</option>' ;
					}
				}
			?>
		</select>

<!------------------SELCT BOX FOR crime SELECTION        !------------------>
		<select class="form-control" style="margin-top:15px;" id="criminalStatus" name="criminalStatus">
			<option selected disabled class="form-control" value="" >SELECT CRIMinal status</option>
			<?php
				$sql = "SELECT * FROM `crime_status`";
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				
				echo '<option class="form-control" value="'.$row['status_id'].'">'.$row['status_name'].'</option>' ;
					}
				}
			?>
		</select>

		<textarea class="form-control" name="crimeDetail" style="margin-top:15px;" rows="5" placeholder="Enter Detail of crime"></textarea>
        <input type="text" class="form-control" id="Address" name="Address" style="margin-top:15px;" placeholder="Address..." />

        <button class="btn btn-info" id="addcriminal" data-dismiss="modal" aria-hidden="true" style="margin-top:15px;">ADD</button>
        <button class="btn btn-danger text-center" style="margin-top:15px;float:right">cancle</button>
        
      </form>
    </div>
  </div>


</div>
<!-----------------Popup modal End for insert record !-------------------->

<!--    modal for more info   !-->
<div class="modal fade" id="moreInfo"> </div>





<input type="hidden" id="officerId" value="<?php echo $_SESSION['officerID'] ?>">
</div>
</body>


</html>

<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

function filters(){
	var x = document.getElementById('filter');
	if(x.style.display === ''){
		x.style.display = "block";
	}else{
		x.style.display = "";
	}
}

function closeSearch(){
	
}

function resetForm(){
	document.getElementById('searchForm').reset();
	document.getElementById('Searchclose').style.visibility = 'hidden';
}
function index(){
	$.ajax({
      url:"main.php",
      method:"POST",
      success:function(data){
      $('#mainContent').html(data);
      }
    });
}

$(document).ready(function(){

index();

//show records

$("#mainbtn").click(function(e){
index();
});

//show records
function loaddata(){
var officerId = $('#officerId').val();
  $.ajax({
      url:"content.php",
      method:"POST",
      data:{officerName:officerId},
      success:function(data){
      $('#mainContent').html(data);
      }
    });

}
$("#veiwCriminals").click(function(e){
	loaddata();
});

//add criminal
$("#addcriminal").click(function(e){
var officerId = $('#officerId').val();
	var formData = new FormData(addCriminal);

    $.ajax({
      url:"addCriminal1.php",
      method:"POST",
      data:formData,
      contentType:false,
      processData:false,
      success:function(data){
      	alert(data);
      	document.getElementById("myform").reset();
        loaddata();
      }
    });
});

//more info 
$(document).on('click', '#MoreInfoBtn', function() {
    var criminal_ID = $(this).data('id');
      $(".modal").show();
      $(".modal-backdrop").show();
  $.ajax({
      url:"moreInfo.php",
      method:"POST",
      data:{CID:criminal_ID},
      success:function(data){
        $('#moreInfo').html(data);
      }
    });

});

//close modal
$(document).on('click', '#closeModal', function() {
  $(".modal").hide();
  $(".modal-backdrop").hide();
});


//veiw Profile
$("#profileVeiw").click(function(e){

    $.ajax({
      url:"Profile1.php",
      method:"POST",
      success:function(data){
        $('#mainContent').html(data);
      }
    });
});

//live search
$(document).on('input', '#search', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#search").val();
var filter = $(".filters:checked").val();

  $.ajax({
    url:"liveSearch.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      $('#mainContent').html(data);
      }
  });

});

});




// image preveiw 

$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>