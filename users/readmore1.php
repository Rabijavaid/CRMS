<?php
$id = $_POST['id'];
include "config.php";
$output = '';
$sql = "SELECT * FROM criminal 
JOIN crime ON crime.crime_id = criminal.C_crime
JOIN crime_status ON crime_status.status_id = criminal.C_status WHERE C_id  = $id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
		$output .= '<div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">
      <div class="model-header">
        <h1 class="text-center text-primary ">'.$row['C_name'].'</h1>
      </div>

      <span class="form-control" style="margin-top:15px;">'.$row['C_Fname'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['C_cnic'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['crime_name'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['status_name'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['C_address'].'</span>
      <textarea class="form-control" style="margin-top:15px;" rows="5" readonly>'.$row['C_detail'].'</textarea>';
	}
}else{
	$output .="NO RECORD FOUND";
}
echo $output;

?>