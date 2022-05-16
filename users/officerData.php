<?php

include "config.php";
$output = '';
$sql = "SELECT * FROM officer
		JOIN rank ON officer.rank = rank.id
		JOIN policestation ON officer.ps_id = policestation.PSID";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
		$output .= '<div class="ContentRecord">
						<div class="imageContainer">
							<img src="../admin/officerImages/'.$row['photo'].'">		
						</div>
						<div class="ContentHolder">
							<div id="Content">
								<span>'.$row['name'].'</span>
								<span>'.$row['Fname'].'</span>
								<span>'.$row['Email'].'</span>
							</div>
							<div id="Content" >
								<span>'.$row['RankName'].'</span>
								<span>'.$row['ps_name'].'</span>
								<span>CASES # '.$row['cases'].'</span>								
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