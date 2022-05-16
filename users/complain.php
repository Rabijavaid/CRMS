<!DOCTYPE html>
<html>
<head>
  <title>CRIMINAL RECORD MANAGMENT SYSTEM</title>
</head>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/complain.css">
<body>
<div class="mainBody">
	<?php include "header.php"  ?>
	<?php include "menu.php"  ?>
	<?php include "config.php" ?>
	<div class="main ">
		<div class="complain" style="width: 500px;margin: 0px auto;">
		<form method="post" action="complainData.php">
			<input type="hidden" name="userName" value="<?php echo $userName ?>">
				<input class="form-control" required type="text" name="subject" placeholder="Subject..." style="margin: 10px 0px;" />
				<textarea class="form-control" required rows="5" placeholder="complain details..." style="margin: 10px 0px;" name="complain"></textarea>
				<input class="btn btn-info btn-block" type="submit" name="submit" style="margin: 10px 0px;"/>
		</form>
		</div>
		<div class="recent">
			<h3>YOUR COMPLAINS :</h3>
<?php
$sql = "SELECT * FROM `complains` WHERE `complainUser` = '{$userName}'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
?>
			<div class="recentComplains">
				<span class="form-control" style="margin: 10px 0px;"><b><span style="color: darkorange;">Subject :</span><?php echo $row['complainSubject'] ?></b></span>
				<span class="form-control" style="margin: 10px 0px;height: auto;"><b><span style="color: darkorange;">Complain :</span><?php echo $row['complaindetails'] ?></b></span>
				<span class="form-control" style="margin: 10px 0px;"><b><span style="color: darkorange;">Status :</span><?php if ($row['complainStatus'] == 0) {
					echo "Panding";
				} elseif ($row['complainStatus'] == 1) {
					echo "solved";
				} ?></b></span>
			</div>
<?php	
	}
}else{
	echo "<h4>No complains!</h4>";
}

?>
			
		</div>
	</div>

</div>
</body>
<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</html>