<?php

include "config.php";
$output = '';
$sql = "SELECT * FROM criminal 
JOIN crime ON crime.crime_id = criminal.C_crime
JOIN crime_status ON crime_status.status_id = criminal.C_status";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
		$output .= '<div class="ContentRecord">
						<div class="imageContainer">
							<img src="../officer/criminalsImages/'.$row['C_image'].'">		
						</div>
						<div class="ContentHolder">
							<div id="Content">
								<span>'.$row['C_name'].'</span>
								<span>'.$row['C_Fname'].'</span>
								<span>'.$row['C_cnic'].'</span>
							</div>
							<div id="Content" >
								<span>'.$row['crime_name'].'</span>
								<span>'.$row['status_name'].'</span>
								<span><button class="btn btn-success" id="MoreInfoBtn" data-target="#moreInfo" data-toggle="modal" data-id="'.$row['C_id'].'">READ MORE</button></span>
							</div>

						</div>

						</div>
					</div>';
	}
}else{
	$output .="NO RECORD FOUND";
}
echo $output;

?>