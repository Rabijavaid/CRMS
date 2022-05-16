<?php 

$id = $_POST['id'];

$output ="";
$conn = mysqli_connect('localhost','root','','crms');

$sql="SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID WHERE `officer_id` ={$id}";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
	while ($row= mysqli_fetch_assoc($result)) {
		$output .='  
		<form>
		<div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

<!--    modal header   !-->
      <a href="" ><i style="float:right;font-size:xx-large;" class="fas fa-times"></i></a>
      <div class="model-header">
        <h1 class="text-center text-primary ">'.$row['name'].'</h1>
      </div>

      <span class="form-control" style="margin-top:15px;">'.$row['Fname'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['Email'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['CNIC'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['RankName'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['ps_name'].'</span>
      <span class="form-control" style="margin-top:15px;">'.$row['contact'].'</span>
      
        
      </form>
    </div>
  </div>';
	}
}else{
	$output .='No record Found';
}

echo $output;

mysqli_close($conn);
?>