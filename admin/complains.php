<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />

<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<!--  search bar css   !-->
<link rel="stylesheet" type="text/css" href="css/searchBar.css" />
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
<!--     search bar  start   !-->
<form id="searchForm">
  <div class="searchMain">
    
      <div class="searchInput">
        <i class="fas fa-search" ></i>
        
        <input type="text" id="searchBar" name="search" placeholder="SEARCH CRMS ..." />
        
        <i class="fas fa-times" id="Searchclose" style="visibility: hidden;" ></i>
      </div>
      <i class="fas fa-server" onclick="filters()" ></i>
      
  <!--     search filters   !-->
      <div id="filter">
        <input type="radio" id="r1" name="filter" class="filtervalue" checked="checked"  value="complainSubject" /><label for="r1">SUBJECT</label>
        <input type="radio" id="r2" name="filter" class="filtervalue" value="complainUser" /><label for="r2">USER-Email</label>
      </div>
    
  </div>
</form>
<!---------------search bar end------------------!-->
<div id="mainContent">


</div>

</div> 

</body>

<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javaScript/searchBar.js"></script>
<script type="text/javascript">

function loadData(){
  $.ajax({
    url:"complainContent.php",
      method:"POST",
      success:function(data){
      	$("#mainContent").html(data);
      }
  });
};
loadData();



	//live search 
$(document).on('input', '#searchBar', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#searchBar").val();
var filter = $(".filtervalue:checked").val();

  $.ajax({
    url:"SearchComplain.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      	$("#mainContent").html(data);
      }
  });

});

//close search  

$(document).on('click', '#Searchclose', function() {
  document.getElementById('searchForm').reset();
  document.getElementById('Searchclose').style.visibility = 'hidden';
  loadData();
});
</script>
</html>