<?php 

$conn = mysqli_connect('localhost','root','','crms');

$id 		= $_POST['id'];
$email   	= $_POST['email']; 
$output ='';

$sql= "SELECT * FROM officer 
JOIN rank ON officer.rank = rank.id
JOIN policestation ON officer.ps_id = policestation.PSID WHERE officer.officer_id = {$id}";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
  while ($row= mysqli_fetch_assoc($result))
  {


$output .='<div class="modal-dialog">
    <div class="modal-content" style="padding:15px;">

      <div class="model-header">
        <h1 class="text-center text-primary ">UPDATE OFFICER</h1>
      </div>
      <form name="updateform" id="updateForm">
      <div class="ml-2 col-sm-6" >
          <div id="msg">
          </div>
        
        <input type="file" name="img" class="file" accept="image/*" style="visibility: hidden;position ": absolute;>
        <div class="input-group my-3">
            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
            <div class="input-group-append">
                <button type="button" class="browse btn btn-primary">Browse...</button>
            </div>
          </div>

      </div>
      <div class="ml-2 col-sm-6">
        <img src="officerImages/'.$row['photo'].'" id="preview" class="img-thumbnail">
      </div>
      <input type="hidden"    name="officerId"    value="'.$row["officer_id"].'"/>
        <input type="text" class="form-control" id="name"  name="name"    style="margin-top:15px;" value="'.$row["name"].'"/>
        <input type="text" class="form-control" id="Fname" name="Fname"   style="margin-top:15px;" value="'.$row["Fname"].'" />

        <div id="emailCheak" style="color: red"></div>
        <input type="text" class="form-control" id="contact" name="contact"   style="margin-top:15px;" value="'.$row['contact'].'"/>
        <input type="text" class="form-control" id="Cnic"  name="Cnic"    style="margin-top:15px;" maxlength="15" value="'.$row['CNIC'].'"/>

        <select id="rank" name="rank" class="form-control" style="margin-top:15px;">
';

      $sql7 = "SELECT * FROM `rank`";
      $result7 = mysqli_query($conn,$sql7);
      while ($row7=mysqli_fetch_assoc($result7)) {
        if($row["rank"] == $row7["id"] ) 
        {
          $selected = 'selected';
        }else{
          $selected ='';
        }
      	$output .='<option class="form-control" '.$selected.' value = "'.$row7["id"].'"  > '.$row7["RankName"].' </option>';

      }



        $output .='


        <input type="text" class="form-control" id="Address" name="Address" style="margin-top:15px;" value="'.$row['city'].'" />
        <input type="submit" value="UPDATE" class="btn btn-info" id="updatebtn2" style="margin-top:15px;" />

        <button class="btn btn-danger text-center" style="margin-top:15px;float:right">cancle</button>
        
      </form>
    </div>
  </div>';
}
}
echo $output;

mysqli_close($conn);

?>