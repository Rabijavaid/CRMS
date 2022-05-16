<?php 

$conn = mysqli_connect('localhost','root','','crms');
$id 		= $_POST['id'];
$output = "";
$sql = "SELECT * FROM `policestation` WHERE `PSID` = {$id}";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {

$output .='<div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

    	<a href="" ><i style="float:right;font-size:xx-large;" class="fas fa-times"></i></a>
      <div class="model-header">
        <h1 class="text-center text-primary ">UPDATE STATION</h1>
      </div>
    <form name="add" id="myform">
      <div class="ml-2 col-sm-6" >
          <div id="msg">
          </div>
        
        </div>
        <input type="hidden" id="stationId" value="'.$row["PSID"].'" />
        <input type="hidden" id="OldOfficerID" value="'.$row["O_id"].'" />
        <input type="text" class="form-control" id="stationname"  style="margin-top:15px;" value="'.$row["ps_name"].'" />
        <input type="text" class="form-control" id="stationcontact"  style="margin-top:15px;" value="'.$row["contactNo"].'" />
        <input type="text" class="form-control" id="stationAddress" style="margin-top:15px;"  value="'.$row["location"].'" />
        <select id="stationOfficer"  class="form-control" style="margin-top:15px;">';

      $sql7 = "SELECT `officer_id`,`name`,`ps_id` FROM `officer` WHERE `ps_id` = 0 OR `ps_id` = {$row['PSID']}";
      $result7 = mysqli_query($conn,$sql7);
      while ($row7=mysqli_fetch_assoc($result7)) {
        if($row["PSID"] == $row7["ps_id"] ) 
        {
          $selected = 'selected';
        }else{
          $selected ='';
        }
      	$output .='<option class="form-control" '.$selected.' value = "'.$row7["officer_id"].'"  > '.$row7["name"].' </option>';
	}
        $output .='
        <input type="text" class="form-control" id="stationlocation" name="location" style="margin-top:15px;"  value="'.$row["url"].'" />

        <button class="btn btn-info form-control" id="update" style="margin-top:15px;">UPDATE</button>
        
        
      </form>
    </div>
  </div>';
}
echo $output;

mysqli_close($conn);
?>