<html>
<head>
<title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<!--  fonts   !-->
<link rel="stylesheet" type="text/css" href="css/fonts.css" />

<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />

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

<!--     DETAIL    !-->
  <div class="circleProgress">

<!--   OFFICERS DETAILS    !-->
  <form>
    <fieldset>
      <legend >OFFICERS <span>total (</span> <span class="TotolOfficers" id="totalOfficers"></span><span>)</span></legend>
    <div class="circleBox">
      <div class="ondutyOfficers circle">
        <strong></strong>
        <span>ON DUTY OFFICERS</span>
        <span class="TotolOfficers" id="onduty"></span>
      </div>
    </div>
    
    <div class="circleBox">
      <div class="offduty circle">
        <strong></strong>
        <span>OFF DUTY OFFICERS</span>
        <span class="TotolOfficers" id="offDuty" ></span>
      </div>
    </div>


  </fieldset>
  </form> 

<!--   POLICE STATION DETAILS    !-->
  <form>
    <fieldset>
      <legend >POLICE STATIONS <span>total (</span> <span class="TotolOfficers" id="total"></span> <span>)</span></legend>
    <div class="circleBox">
      <div class="OprationalStations circle">
        <strong></strong>
        <span>ON DUTY OFFICERS</span>
        <span class="TotolOfficers" id="operationalStations"></span>
      </div>
    </div>

    <div class="circleBox">
      <div class="FreeStation circle">
        <strong></strong>
        <span>OFF DUTY OFFICERS</span>
        <span class="TotolOfficers" id="FreeStations"></span>
      </div>
    </div>

  </fieldset>
  </form> 

</div>

<div id="officer"></div>
<div id="stationscript"></div>

</div>


<!-- script for open and close the side bar   !-->


<script type="text/javascript">

$(document).ready(function(){

//officers record


  $.ajax({
      url:"OfficersDetails.php",
      method:"POST",
      success:function(data){
      var outputarray = $.parseJSON(data);
      document.getElementById('totalOfficers').innerHTML = outputarray.total;

      $('#onduty').html(outputarray.onduty);
      $('#offDuty').html(outputarray.offduty);
      $("#officer").html(outputarray.output);
      
      }
});


//police station record
  $.ajax({
      url:"stationsDetail.php",
      method:"POST",
      success:function(data){
      var stationarray = $.parseJSON(data);
      $('#stationscript').html(stationarray.output);

      $('#total').html(stationarray.total);
      $('#operationalStations').html(stationarray.operational);
      $("#FreeStations").html(stationarray.free);


      count();
      }
});

});



// function to count the integers in web
function count(){
$(".TotolOfficers").counterUp({
    delay:10,
    time:500,
  });
};
</script>


<script type = "text/javascript" language = "javascript" src="javaScript/circle-progress.js"></script>
<script src="javaScript/jquery.waypoints.min.js"></script>
<script src="javaScript/jquery.counterup.min.js"></script>

</body>

</html>