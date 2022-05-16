<?php

$searchText = $_POST['search'];
$searchFilter = $_POST['filter'];

$output ="";
$conn = mysqli_connect('localhost','root','','crms');

$sql= "SELECT * FROM policestation 
JOIN officer on policestation.O_id = officer.officer_id WHERE policestation.".$searchFilter." LIKE '%".$searchText."%' AND policestation.PSID !=0 ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row= mysqli_fetch_assoc($result))
	{
		$output .= '<div class="ContentRecord" >

    <div class="ContentHolder">
      <div id="Content">
        <span>'.$row['PSID'].'</span>
        <span>'.$row['ps_name'].'</span>
        <span><a href="'.$row['url'].'" target="_blank">'.$row['location'].'</a></span>
      </div>
      <div id="Content" >
      <span>'.$row['contactNo'].'</span>
        <span>'.$row['name'].'</span>
        <button class="btn btn-info" id="updateBtn" >UPDATE</button>
        <button class="btn btn-danger" id="delBtn" data-id="'.$row['PSID'].'">DELETE</button>

      </div>

    </div>
  </div>';

	}
}else{
	$output = "<h2>No Record Found</h2>";
}
echo $output;
?>