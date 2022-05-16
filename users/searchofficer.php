<?php

$search = $_POST['search'];
$filter = $_POST['filter']; 

include "config.php";
$output = '';
if ($filter == "rank") {
	$sql = "SELECT * FROM officer
		JOIN rank ON officer.rank = rank.id
		JOIN policestation ON officer.ps_id = policestation.PSID
		WHERE rank.RankName LIKE '%".$search."%'";
}elseif ($filter == "ps_id") {
	$sql = "SELECT * FROM officer
		JOIN rank ON officer.rank = rank.id
		JOIN policestation ON officer.ps_id = policestation.PSID
		WHERE  policestation.ps_name LIKE '%".$search."%'";
} else{
	$sql = "SELECT * FROM officer
		JOIN rank ON officer.rank = rank.id
		JOIN policestation ON officer.ps_id = policestation.PSID
		WHERE  officer.".$filter." LIKE '%".$search."%'";
}

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
	$output .="<h1 style='color: #fff;border-bottom: 2px solid #fff;display: inline;'>NO RECORD FOUND</h1>";
}
echo $output;

?>