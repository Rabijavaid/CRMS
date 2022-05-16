<?php 

$conn = mysqli_connect('localhost','root','','crms');

$id     = $_POST['id'];
$output ='';

$sql= "SELECT * FROM criminal 
JOIN crime ON criminal.C_crime = crime.crime_id
JOIN crime_status ON criminal.C_status = crime_status.status_id
JOIN officer ON criminal.C_officer = officer.officer_id WHERE C_id = {$id}";
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
        <img src="../officer/criminalsImages/'.$row['C_image'].'" id="preview" class="img-thumbnail">
      </div>
      <input type="hidden"    name="criminalId"    value="'.$row["C_id"].'"/>
        <input type="text" class="form-control" id="name"  name="name"    style="margin-top:15px;" value="'.$row["C_name"].'"/>
        <input type="text" class="form-control" id="Fname" name="Fname"   style="margin-top:15px;" value="'.$row["C_Fname"].'" />

        <div id="emailCheak" style="color: red"></div>
        <input type="text" class="form-control" id="address" name="address"   style="margin-top:15px;" value="'.$row['C_address'].'"/>
        <input type="text" class="form-control" id="Cnic"  name="Cnic"    style="margin-top:15px;" maxlength="15" value="'.$row['C_cnic'].'"/>

        <select id="crime" name="crime" class="form-control" style="margin-top:15px;">
';

      $sql7 = "SELECT * FROM `crime`";
      $result7 = mysqli_query($conn,$sql7);
      while ($row7=mysqli_fetch_assoc($result7)) {
        if($row["C_crime"] == $row7["crime_id"] ) 
        {
          $selected = 'selected';
        }else{
          $selected ='';
        }
        $output .='<option class="form-control" '.$selected.' value = "'.$row7["crime_id"].'"  > '.$row7["crime_name"].' </option>';

      }$output .='
        </select>

        <select id="crimeStatus" name="crimeStatus" class="form-control" style="margin-top:15px;">
';

      $sql7 = "SELECT * FROM `crime_status`";
      $result7 = mysqli_query($conn,$sql7);
      while ($row7=mysqli_fetch_assoc($result7)) {
        if($row["C_status"] == $row7["status_id"] ) 
        {
          $selected = 'selected';
        }else{
          $selected ='';
        }
        $output .='<option class="form-control" '.$selected.' value = "'.$row7["status_id"].'"  > '.$row7["status_name"].' </option>';

      }$output .='
        </select>';


        $output .='
        </select>
        <textarea class="form-control" name="crimeDetail" style="margin-top:15px;" rows="5" >"'.$row['C_detail'].'"</textarea>
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