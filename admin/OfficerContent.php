<?php 

$conn = mysqli_connect('localhost','root','','crms');
$output ="";
$sql= "SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
  while ($row= mysqli_fetch_assoc($result))
  {
    $output .= '
    <div class="ContentRecord" >
    <div class="imageContainer">
    <img src="officerImages/'.$row['photo'].'" alt="officer Image">   
  </div>
  <div class="ContentHolder">
    <div id="Content">
      <span>'.$row['officer_id'].'</span>
      <span>'.$row['name'].'</span>
      
      <span>case reported # '.$row['cases'].'</span>
    </div>
    <div id="Content" >
    <span>'.$row['RankName'].'</span>
      <span>'.$row['city'].'</span>
      <span>'.$row['CNIC'].'</span>
      <button class="btn btn-info" id="updateBtn" data-toggle="modal" data-target="#UpdateModal"  data-id="'.$row['officer_id'].'" data-emailupdate="'.$row['Email'].'" >UPDATE</button>
      <button class="btn btn-danger" id="delBtn" data-id="'.$row['officer_id'].'" data-email="'.$row['Email'].'" data-name="'.$row['name'].'">DELETE</button>
      <button class="btn btn-success" id="MoreInfoBtn" data-target="#MoreInfo" data-toggle="modal" data-oid="'.$row['officer_id'].'">MORE INFO</button>
    </div>

  </div>
  </div>';  
}}else{
  $output .= "<h2>No Record Found</h2>";
}

echo $output;
mysqli_close($conn);
?>