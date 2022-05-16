<?php



include "config.php";
include "sessionConfirm.php";

$officerName = $officerID;
$output = "";
$sql ="SELECT * FROM `criminal`
JOIN crime ON criminal.C_crime = crime.crime_id
JOIN crime_status ON criminal.C_status = crime_status.status_id
WHERE `C_officer` = {$officerName}";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $output .='<div class="ContentRecord" >
    <div class="imageContainer">
    <img src="criminalsImages/'.$row['C_image'].'" >   
  </div>
  <div class="ContentHolder">
    <div id="Content">
      <span>'.$row['C_name'].'</span>
      <span>'.$row['C_cnic'].'</span>
      <span>'.$row['crime_name'].'</span>
    </div>
    <div id="Content" >
      <span>'.$row['status_name'].'</span>
      <span>'.$row['C_address'].'</span>
      <button class="btn btn-success" data-id="'.$row['C_id'].'" id="MoreInfoBtn" data-target="#moreInfo" data-toggle="modal">MORE INFO</button>
    </div>

  </div>
  </div>';
  }
}else{
  $output = "No Record Found !";
}


  echo $output;

?>