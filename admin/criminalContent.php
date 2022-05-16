<?php 
$output ="";
$conn = mysqli_connect('localhost','root','','crms');

$sql= "SELECT * FROM criminal 
JOIN crime ON criminal.C_crime = crime.crime_id
JOIN crime_status ON criminal.C_status = crime_status.status_id
JOIN officer ON criminal.C_officer = officer.officer_id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row= mysqli_fetch_assoc($result))
	{

		$output .= '
		<div class="ContentRecord" >
		<div class="imageContainer">
    <img src="../officer/criminalsImages/'.$row['C_image'].'" alt="officer Image">   
  </div>
  <div class="ContentHolder">
    <div id="Content">
      <span>'.$row['C_id'].'</span>
      <span>'.$row['C_name'].'</span>
      
      <span>'.$row['crime_name'].'</span>
    </div>
    <div id="Content" >
    <span>'.$row['status_name'].'</span>
      <span>'.$row['C_address'].'</span>
      <span>'.$row['C_cnic'].'</span>
      <button class="btn btn-info" id="updateBtn" data-target="#UpdateModal" data-toggle="modal" data-id="'.$row['C_id'].'">UPDATE</button>
      <button class="btn btn-danger" id="delBtn" data-name="'.$row['C_name'].'" data-oid="'.$row['C_id'].'">DELETE</button>
      <button id="MoreInfoBtn" class="btn btn-success" data-toggle="modal" data-target="#MoreInfo"  data-cid="'.$row['C_id'].'">MORE INFO</button>
    </div>

  </div>
  </div>';	
} 
}
else{
	$output = "<h2>No Record Found</h2>";
}

echo $output;
mysqli_close($conn);
?>