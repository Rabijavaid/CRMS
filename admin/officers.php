<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />
<!--  search bar css   !-->
<link rel="stylesheet" type="text/css" href="css/searchBar.css" />
<!--  bootstrap   !-->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/officer.css" />
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
    
      <input type="button" class="btn btn-primary" data-target="#mymodel" data-toggle="modal" value="ADD" />
      <div class="searchInput">
        <i class="fas fa-search" ></i>
        
        <input type="text" id="searchBar" name="search" placeholder="SEARCH CRMS ..." />
        
        <i class="fas fa-times" id="Searchclose" style="visibility: hidden;" ></i>
      </div>
      <i class="fas fa-server" onclick="filters()" ></i>
      
  <!--     search filters   !-->
      <div id="filter">
        <input type="radio" id="r1" name="filter" class="filtervalue" checked="checked"  value="Name" /><label for="r1">NAME</label>
        <input type="radio" id="r2" name="filter" class="filtervalue" value="RankName" /><label for="r2">RANK</label>
        <input type="radio" id="r3" name="filter" class="filtervalue" value="city" /><label for="r3">ADDRESS</label>
        <input type="radio" id="r4" name="filter" class="filtervalue" value="cases" /><label for="r4">CASES</label>
        <input type="radio" id="r5" name="filter" class="filtervalue" value="CNIC" /><label for="r5">CNIC</label>
        <input type="radio" id="r6" name="filter" class="filtervalue" value="ps_name" /><label for="r6">Police Station</label>
      </div>
    
  </div>
</form>

<!---------------search bar end------------------!-->
  
<!--------------Main content start -----------------!-->
<div id="MainContent"></div>  

<!--------------Main content End-----------------!-->
<!-----------------Popup modal for more info !-------------------->
<!--    modal    !-->
<div class="modal " id="MoreInfo">

</div>
<!-----------------Popup modal End for  more info !-------------------->

<!-----------------Popup modal for Update !-------------------->
<!--    modal    !-->
<div class="modal " id="UpdateModal"></div>
<!-----------------Popup modal End for  Update !-------------------->
<!--------------content body close -----------------!-->







<!-----------------Popup modal for insert record !-------------------->
<!--    modal    !-->
<div class="modal fade" id="mymodel">
  <div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

<!--    modal header   !-->
      <div class="model-header">
        <h1 class="text-center text-primary ">ADD OFFICER</h1>
      </div>

<!--    image uploader    !-->
    <form name="add" id="myform">
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
        <input type="text" class="form-control" id="name"  name="name"    style="margin-top:15px;" placeholder="Name..." />
        <input type="text" class="form-control" id="Fname" name="Fname"   style="margin-top:15px;" placeholder="F Name..." />
        <input type="text" class="form-control" id="Email" name="Email"   style="margin-top:15px;" placeholder="Email..." />
        <div id="emailCheak" style="color: red"></div>
        <input type="text" class="form-control" id="contact" name="contact"   style="margin-top:15px;" placeholder="Contact #..." />
        <input type="text" class="form-control" id="Cnic"  name="Cnic"    style="margin-top:15px;" placeholder="CNIC..." maxlength="15" />

<!------------------SELCT BOX FOR RANK SELECTION        !------------------>
      
      
        <select id="rank" name="rank" class="form-control" style="margin-top:15px;">
          <option disabled="disabled" selected="selected" class="form-control" value=""> SELECT RANK </option>

          <?php 
      $conn = mysqli_connect('localhost','root','','crms');
      $sql = "SELECT `id`,`RankName` FROM `rank`";
      $result = mysqli_query($conn,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
        
      ?>
          <option class="form-control" value = <?php echo $row["id"] ?> > <?php echo $row["RankName"] ?></option>

      <?php 
      }
      ?>
        </select>




        <input type="text" class="form-control" id="Address" name="Address" style="margin-top:15px;" placeholder="Address..." />

        <button class="btn btn-info" id="addOfficer" data-dismiss="modal" aria-hidden="true" style="margin-top:15px;">ADD</button>
        <button class="btn btn-danger text-center" style="margin-top:15px;float:right">cancle</button>
        
      </form>
    </div>
  </div>

</div>
</div>
<!-----------------Popup modal End for insert record !-------------------->
</body>
</html>

<!--  jquery file   !-->
<script src="../bootstrap/jquery.min.js"></script>
<!-- bootstrap jquery file   !-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javaScript/searchBar.js"></script>
<script type="text/javascript">

$(document).ready(function(){
// to load data in main content 
function loadData(){
  $.ajax({
      url:"OfficerContent.php",
      method:"POST",
      success:function(data){
      $('#MainContent').html(data);
      }
});
};
loadData();
// cheak email validation 

var cheakMail= '';
 
  $("#Email").blur(function(e){

    var email = $('#Email').val();

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
        
      }
    });


//add officer 

  $("#addOfficer").click(function(e){
    e.preventDefault();
    if (cheakMail== 1) {
      alert("Cannot Insert This Email .");
    }else{
    var name = $('#name').val();
    var Fname = $('#Fname').val();
    var Email = $('#Email').val();
    var Cnic = $('#Cnic').val();
    var Address = $('#Address').val();
    var rank = $('#rank').val();
    var contact = $('#contact').val();

    if (name === '' || Fname === '' || Email === '' || Cnic === '' || Address ==='' || contact ==='' ) {
      alert("Fill All Fields");
    }else{

    var formData = new FormData(add);

    $.ajax({
      url:"addOfficer.php",
      method:"POST",
      data:formData,
      contentType:false,
      processData:false,
      success:function(data){
        alert(data);
        document.getElementById("myform").reset();
        loadData();
      }
    });
}
}
  });
});
//live search   

$(document).on('input', '#searchBar', function() {

document.getElementById('Searchclose').style.visibility = 'visible';

var search = $("#searchBar").val();
var filter = $(".filtervalue:checked").val();

  $.ajax({
    url:"search.php",
      method:"POST",
      data:{search:search,filter:filter},
      success:function(data){
      $('#MainContent').html(data);
      }
  });

});

//close search  

$(document).on('click', '#Searchclose', function() {
  document.getElementById('searchForm').reset();
  document.getElementById('Searchclose').style.visibility = 'hidden';
  loadData();
});

//delete button

$(document).on('click', '#delBtn', function(){
    var id = $(this).data('id');
    var oname = $(this).data('name');
    var Email = $(this).data('email');
    var element = this;
    if (confirm("Do You Want To Delete The Record Of '"+oname+"'")) {
  $.ajax({
    url:"delete.php",
      method:"POST",
      data:{id:id,Email:Email},
      success:function(data){
      $(element).closest(".ContentRecord").fadeOut();
      alert("record deleted successfully");
      }
  });
}
});

//more info

$(document).on('click', '#MoreInfoBtn', function(){
  var oid = $(this).data('oid');
  $.ajax({
    url:"moreInfo.php",
      method:"POST",
      data:{id:oid},
      success:function(data){
      $('#MoreInfo').html(data);
      }
  });
});

//officer update button 
$(document).on('click', '#updateBtn', function(e){

  var id = $(this).data('id');
  var email = $(this).data('emailupdate');

  $.ajax({
    url:"update.php",
      method:"POST",
      data:{id:id,email:email},
      success:function(data){
      $('#UpdateModal').html(data);
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
//update officer 

$(document).on('click','#updatebtn2', function(e){

var formData = new FormData(updateform);

    $.ajax({
      url:"update2.php",
      method:"POST",
      data:formData,
      contentType:false,
      processData:false,
      success:function(data){
      
      }
    });

});

});




</script>
