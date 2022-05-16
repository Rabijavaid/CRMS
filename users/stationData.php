<?php

include "config.php";
$output = '';
$sql = "SELECT * FROM `policestation` WHERE `PSID` != 0";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
		$output .= '<div class="ContentRecord">
						<div class="ContentHolder">
							<div id="Content">
								<span>'.$row['ps_name'].'</span>
								<span>'.$row['contactNo'].'</span>
							</div>
							<div id="Content" >
								<span>'.$row['location'].'</span>
								<span><a href='.$row['url'].' target="_blank">LOCATION</a></span>								
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