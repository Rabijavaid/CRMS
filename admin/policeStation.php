<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />
<!--  search bar css   !-->
<link rel="stylesheet" type="text/css" href="css/searchBar.css" />

<link rel="stylesheet" type="text/css" href="css/station.css" />
<!--  fonts style sheet   !-->
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css" />
<!--  bootstrap   !-->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />




<body>

<?php include "sessionConfirm.php" ?>

<?php include "side-bar.php" ?>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
<!--  header include    !-->
<?php include "header.php" ?>

<!------Search bar start---------!-->
<form id="searchForm">
  <div class="searchMain">
    
      <input type="button" class="btn btn-primary" data-target="#mymodel" data-toggle="modal" value="ADD" />
      <div class="searchInput">
        <i class="fas fa-search" ></i>
        
        <input type="text" id="searchBar" name="search" placeholder="SEARCH CRMS ..." />
        
        <i class="fas fa-times" id="Searchclose" style="visibility: hidden;" ></i>
      </div>
      <i class="fas fa-server" onclick="filters()" ></i>
      
  <!--     search filters   !-->
      <div id="filter">
        <input type="radio" id="r1" name="filter" class="filtervalue" checked="checked"  value="ps_name" /><label for="r1">NAME</label>
        <input type="radio" id="r2" name="filter" class="filtervalue" value="location" /><label for="r2">ADDRESS</label>
        
      </div>
    
  </div>
</form>
<!------Search bar end ---------!-->

<!----------Main Content start------------>
<div id="MainContent"></div> 
<!----------Main Content end------------>


<!-----------------Popup modal for insert record !-------------------->
<!--    modal    !-->
<div class="modal fade" id="mymodel">
  <div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

<!--    modal header   !-->
      <div class="model-header">
        <h1 class="text-center text-primary ">ADD Station</h1>
      </div>

<!--    image uploader    !-->
    <form name="add" id="myform">
      <div class="ml-2 col-sm-6" >
          <div id="msg">
          </div>
        
        </div>

        <input type="text" class="form-control" required id="name"  name="name"    style="margin-top:15px;" placeholder="Station Name..." />
        <input type="text" class="form-control" required id="contact" name="contact"   style="margin-top:15px;" placeholder="Contact #..." />
        <input type="text" class="form-control" required id="Address" name="Address" style="margin-top:15px;" placeholder="Address..." />
        <input type="text" class="form-control" required id="location" name="location" style="margin-top:15px;" placeholder="location..." />

        <button class="btn btn-info form-control" id="addstation" style="margin-top:15px;">ADD</button>
        
        
      </form>
    </div>
  </div>


</div>
<!-----------------Popup modal End for insert record !-------------------->

<!-----------------Popup modal start for insert record !-------------------->
<div class="modal fade" id="UpdateModal"> </div>
<!-----------------Popup modal End for insert record !-------------------->
</div>

</body>
<script type="text/javascript" src="javaScript/searchBar.js"></script>
<!--  jquery file   !-->
<script src="../bootstrap/jquery.min.js"></script>
<!-- bootstrap jquery file   !-->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

// to load data in main content 

function loadData(){
  $.ajax({
      url:"policeStataionContent.php",
      method:"POST",
      success:function(data){
        $("#MainContent").html(data);
      }
});
}
loadData();

//live search   

$(document).on('input', '#searchBar', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#searchBar").val();
var filter = $(".filtervalue:checked").val();

  $.ajax({
      url:"searchstation.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
        $("#MainContent").html(data);
      }
});

});

//close search  

$(document).on('click', '#Searchclose', function() {
  document.getElementById('searchForm').reset();
  document.getElementById('Searchclose').style.visibility = 'hidden';
  loadData();
});


//add officer 

$("#addstation").click(function(e){


    var name = $('#name').val();
    var Address = $('#Address').val();
    var contact = $('#contact').val();
    var location = $('#location').val();
    $.ajax({
      url:"addStation.php",
      method:"POST",
      data:{name:name,Address:Address,contact:contact,location,location},
      success:function(data){
        alert(data);
      loadData();
      }
    });
});

//delete station 

$(document).on('click','#delBtn', function(){
  var id = $(this).data('id');
  if (confirm("do you want to delete station !")) {
  $.ajax({
      url:"deleteStation.php",
      method:"POST",
      data:{id:id},
      success:function(data){
        loadData();
      }
    });
}
});

//update station popup
$(document).on('click', '#updateBtn', function(){

  var id = $(this).data('id');
  $.ajax({
    url:"updatestation.php",
      method:"POST",
      data:{id:id},
      success:function(data){
      $('#UpdateModal').html(data);
      }
  });
});

//update station btn
$(document).on('click', '#update', function(){
  var stationId = $('#stationId').val();
  var stationName = $('#stationname').val();
  var stationContact = $('#stationcontact').val();
  var stationAddress = $('#stationAddress').val();
  var stationLocation = $('#stationlocation').val();
  var stationOfficer = $('#stationOfficer').val();
  var oldOfficer = $('#OldOfficerID').val();

  $.ajax({
    url:"updateStation2.php",
      method:"POST",
      data:{stationId:stationId,stationName:stationName,stationContact:stationContact,stationAddress:stationAddress,stationLocation:stationLocation,stationOfficer:stationOfficer,oldOfficer:oldOfficer,stationId:stationId},
      success:function(data){
      alert(data);
      }
  });
});

});
</script>


<script type="text/javascript">

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

</html>