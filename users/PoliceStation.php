<!DOCTYPE html>
<html>
<head>
  <title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/criminal.css">
<link rel="stylesheet" type="text/css" href="css/searchBar.css">
<body>
<div class="mainBody">
	<?php include "header.php"  ?>
	<?php include "menu.php"  ?>

<!---------- SEARCH BAR START ----------->	
<form id="searchForm">
	<div class="searchMain">

			<div class="searchInput">
				<i class="fas fa-search" ></i>
				
				<input type="text" id="searchBar" name="search" placeholder="SEARCH CRMS ..."  />
				
				<i class="fas fa-times" id="Searchclose" style="visibility: hidden;" onclick="resetForm()"></i>
			</div>
			<i class="fas fa-server" onclick="filters()" ></i>
			
	<!--     search filters   !-->
			<div id="filter">
				<input class="filterValue" type="radio" id="r1" name="filter" checked="checked" value="ps_name" /><label for="r1"  >NAME</label>
				<input class="filterValue" type="radio" id="r2" name="filter" value="location" /><label for="r2">ADDRESS</label>
				<input class="filterValue" type="radio" id="r3" name="filter" value="contactNo" /><label for="r3">CONTACT NO</label>
			</div>
		
	</div>
</form>
<!---------- SEARCH BAR END ----------->	
	<div class="main" id="main">

	</div>

	<!--    modal for more info   !-->
<div class="modal" id="moreInfo"></div>

</body>
<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
function loadData(){
	$.ajax({
		url:"stationData.php",
		method:"post",
		success:function(data){
			$('#main').html(data);
		}
	});
};
loadData();

//live search   

$(document).on('input', '#searchBar', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#searchBar").val();
var filter = $(".filterValue:checked").val();

  $.ajax({
    url:"searchStation.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      $('#main').html(data);
      }
  });

});

//close search 
function resetForm(){
	document.getElementById('searchForm').reset();
	document.getElementById('Searchclose').style.visibility = 'hidden';
	loadData();
}

//open filters
function filters(){
	var x = document.getElementById('filter');
	if(x.style.display === ''){
		x.style.display = "block";
	}else{
		x.style.display = "";
	}
}


</script>
</html>