<?php

$output = "";
$conn = mysqli_connect('localhost','root','','crms');
$sql = "SELECT * FROM complains 
JOIN user ON user.userEmail = complains.complainUser
WHERE complains.complainStatus = 0";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
$output .='
<div style="width: 100%;height:auto; padding: 10px;border-bottom: 2px dashed green;">
	<div style="display: flex;">
		<div style="width: 50%;">
			<span class="form-control"> <b><span>SUBJECT :	</span></b> '.$row["complainSubject"].'</span>
			<a href="solveComplain.php?id='.$row["id"].'" class="btn btn-success" style="margin-top: 10px;">SOLVE</a>
		</div>
		<div style="width: 50%;">
			<span class="form-control" style="margin-bottom: 10px"> <b><span>Name:	</span></b>'.$row["userName"] .'</span>
			<span class="form-control"> <b><span>Contact :	</span></b>'.$row["userContact"] .'</span>
		</div>
	</div>
	<div style="margin-top: 20px;">
		<textarea class="form-control" rows="4">'.$row["complaindetails"].'</textarea>
	</div>
</div>';

	}
}else{
	$output .="<h2>No Complains </h2>";
}

echo $output;
?>