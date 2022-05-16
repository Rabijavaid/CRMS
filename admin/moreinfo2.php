<?php 

$id = $_POST['id'];

$output ="";
$conn = mysqli_connect('localhost','root','','crms');

$sql="SELECT `C_detail`,`C_name` FROM `criminal` WHERE `C_id` = {$id}";
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
        <h1 class="text-center text-primary ">'.$row['C_name'].'</h1>
      </div>

      <textarea class="form-control" name="crimeDetail" style="margin-top:15px;" rows="5" >'.$row['C_detail'].'</textarea>
        
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