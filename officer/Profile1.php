<?php

include "config.php";
$output = '';
$sql="SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID
WHERE officer.officer_id = 2";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	$output .='<div class="container" style="padding-top: 60px;color:#fff;">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="../admin/officerImages/'.$row['photo'].'" style="width: 200px;">
      </div>
    </div>
    <!-- edit form column -->
 <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">First name:</label>
          <div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['name'].'</span>
   </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">F name:</label>
          <div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['Fname'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">Email:</label>
          <div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['Email'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">police station :</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['ps_name'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">cases #</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['cases'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">CNIC :</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['CNIC'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">RANK :</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['RankName'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">Contact #</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['contact'].'</span>
          </div>
        </div>
        <div class="form-group" style="display:flex;">
          <label class="control-label" style="width: 150px;font-weight: 600;outline: auto;padding: 2px 10px;background-color: rgba(0,0,0,0.5);">Address :</label>
<div class="col-lg-8">
            <span class="form-control" style="background-color:#818181;color:#fff;font-weight: 600;">'.$row['city'].'</span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>';
}

echo $output;

?>