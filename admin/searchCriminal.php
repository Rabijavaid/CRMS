<?php

$search = $_POST['search'];
$filter = $_POST['filter']; 

$conn = mysqli_connect('localhost','root','','crms');
$output = '';
if ($filter == "C_status") {
	$sql = "SELECT * FROM criminal 
		JOIN crime ON crime.crime_id = criminal.C_crime
		JOIN crime_status ON crime_status.status_id = criminal.C_status
		WHERE crime_status.status_name LIKE '%".$search."%'";
}elseif ($filter == "C_crime") {
	$sql = "SELECT * FROM criminal 
		JOIN crime ON crime.crime_id = criminal.C_crime
		JOIN crime_status ON crime_status.status_id = criminal.C_status
		WHERE crime.crime_name LIKE '%".$search."%'";
} else{
	$sql = "SELECT * FROM criminal 
		JOIN crime ON crime.crime_id = criminal.C_crime
		JOIN crime_status ON crime_status.status_id = criminal.C_status
		WHERE criminal.".$filter." LIKE '%".$search."%'";
}

$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
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
	$output .="<h1 style='border-bottom: 2px solid #000;display: inline;'>NO RECORD FOUND</h1>";
}
echo $output;

?>