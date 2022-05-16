<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />
<!--  bootstrap   !-->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<!--  search bar css   !-->
<link rel="stylesheet" type="text/css" href="css/searchBar.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/criminals.css">
<!--  fonts style sheet   !-->
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />



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
        <input type="radio" id="r1" name="filter" class="filtervalue" checked="checked"  value="C_name" /><label for="r1">NAME</label>
        <input type="radio" id="r2" name="filter" class="filtervalue" value="C_crime" /><label for="r2">CRIME</label>
        <input type="radio" id="r3" name="filter" class="filtervalue" value="C_address" /><label for="r3">ADDRESS</label>
        <input type="radio" id="r4" name="filter" class="filtervalue" value="C_status" /><label for="r4">STATUS</label>
        <input type="radio" id="r5" name="filter" class="filtervalue" value="C_cnic" /><label for="r5">CNIC</label>
      </div>
    
  </div>
</form>
<!---------------search bar end------------------!-->

<!-------------main content ------------->
<div id="MainContent"></div>
</div>
<!------------main content end --------->

<!-----------------Popup modal for Update !-------------------->
<!--    modal    !-->
<div class="modal " id="UpdateModal">

</div>
<!-----------------Popup modal End for  Update !-------------------->
<!-----------------Popup modal for more info !-------------------->
<!--    modal    !-->
<div class="modal " id="MoreInfo">

</div>
<!-----------------Popup modal End for  more info !-------------------->
</body>

</html>

<!--  jquery file   !-->
<script src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javaScript/searchBar.js"></script>
<script type="text/javascript">




function loadData(){
  $.ajax({
    url:"criminalContent.php",
      method:"POST",
      success:function(data){
      $('#MainContent').html(data);
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
    url:"",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      }
  });

});

//close search  

$(document).on('click', '#Searchclose', function() {
  document.getElementById('searchForm').reset();
  document.getElementById('Searchclose').style.visibility = 'hidden';
  loadData();
});

//officer update button 
$(document).on('click', '#updateBtn', function(){

  var id = $(this).data('id');

  $.ajax({
    url:"updateCriminal.php",
      method:"POST",
      data:{id:id},
      success:function(data){
      $('#UpdateModal').html(data);
      }
});
});


//update criminal
$(document).on('click','#updatebtn2', function(e){

var formData = new FormData(updateform);

    $.ajax({
      url:"update3.php",
      method:"POST",
      data:formData,
      contentType:false,
      processData:false,
      success:function(data){
      
      }
    });

});

//dalete criminal
$(document).on('click','#delBtn', function(e){


var name = $(this).data('name');
var id = $(this).data('oid');

var confirmid = confirm("Do You Realy Want To Delete The Record of '"+name+"' ?");
if (confirmid == true) {
      $.ajax({
      url:"deleteCriminal.php",
      method:"POST",
      data:{id:id},
      success:function(data){
        loadData();
      }
    });
}
});

//more info criminal
$(document).on('click','#MoreInfoBtn', function(e){
var id = $(this).data('cid');

$.ajax({
      url:"moreinfo2.php",
      method:"POST",
      data:{id:id},
      success:function(data){
        $('#MoreInfo').html(data);
      }
    });

});

//live search   

$(document).on('input', '#searchBar', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#searchBar").val();
var filter = $(".filterValue:checked").val();

  $.ajax({
    url:"searchCriminal.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      $('#MainContent').html(data);
      }
  });

});


// image preveiw 
$(document).on("click",".browse", function() {
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
