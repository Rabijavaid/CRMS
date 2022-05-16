<?php

include 'config.php';
$cid = $_POST['CID'];
$output ='';

$sql = "SELECT * FROM `criminal`
JOIN crime ON criminal.C_crime = crime.crime_id
JOIN crime_status ON criminal.C_status = crime_status.status_id
WHERE criminal.C_id = $cid";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	
$output ='<form>
		<div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

<!--    modal header   !-->
      <i style="float:right;font-size:xx-large;color:#007bff;" class="fas fa-times" id="closeModal"></i>
      <div class="model-header">
        <h1 class="text-center text-primary ">'.$row['C_name'].'</h1>
      </div>

      <span class="form-control" style="margin-top:15px;">'.$row['C_Fname'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['C_cnic'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['crime_name'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['status_name'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['C_address'].'</span>
      <textarea class="form-control" style="margin-top:15px;" rows="5">'.$row['C_detail'].'</textarea>
      
      
        
      </form>
    </div>
  </div>';
}
  echo $output;


?>