<?php

$searchText = $_POST['search'];
$searchFilter = $_POST['filter'];

$output ="";
$conn = mysqli_connect('localhost','root','','crms');

if ($searchFilter != 'RankName' AND $searchFilter != 'ps_name') {
	$sql= "SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID WHERE officer.".$searchFilter." LIKE '%{$searchText}%'";
}elseif ($searchFilter == 'ps_name') {
  $sql= "SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID WHERE policestation.".$searchFilter." LIKE '%{$searchText}%'";
}

else if ($searchFilter == 'RankName') {
	$sql= "SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID rank.".$searchFilter." LIKE '%{$searchText}%'";
}

$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row= mysqli_fetch_assoc($result))
	{
		$path="officer_image/" . $row['photo'];

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
      <button class="btn btn-info" id="updateBtn" data-target="#UpdateModal" data-toggle="modal" data-id="'.$row['officer_id'].'" data-emailupdate="'.$row['Email'].'">UPDATE</button>
      <button class="btn btn-danger" id="delBtn" data-id="'.$row['officer_id'].'" data-name="'.$row['name'].'" >DELETE</button>
      <button class="btn btn-success" id="MoreInfoBtn" data-target="#MoreInfo" data-toggle="modal" data-oid="'.$row['officer_id'].'">MORE INFO</button>
    </div>

  </div>
  </div>';	
}
}else{
	$output = "<h2>No Record Found</h2>";
}

echo $output;
?>
