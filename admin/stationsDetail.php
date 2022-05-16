<?php 

$output = '';

$conn = mysqli_connect('localhost','root','','crms');

	$sql = "SELECT COUNT(`PSID`) FROM policestation WHERE `PSID` !=0" ;
	$result = mysqli_query($conn,$sql);

	$sql1 = "SELECT COUNT(`PSID`) FROM policestation WHERE `O_id` != 0";
	$result1 = mysqli_query($conn,$sql1);
	while ($row1 = mysqli_fetch_assoc($result1)) {
		$operational = $row1['COUNT(`PSID`)'];
	};

	$sql2 = "SELECT COUNT(`PSID`) FROM policestation WHERE `O_id` = 0 AND `PSID` !=0";
	$result2 = mysqli_query($conn,$sql2);
	while ($row2 = mysqli_fetch_assoc($result2)) {
		$free = $row2['COUNT(`PSID`)'];
	};

	while ($row = mysqli_fetch_assoc($result)) {

		$total = $row['COUNT(`PSID`)'];

	$output .= "
	<script>
var totalStations = '".$row['COUNT(`PSID`)']."';
var operational = $operational;
var free = $free;

(function($) {
var station1 = $total;
var abc1= operational;
var p1 = (abc1 * 100) / station1 ;
var x1 = Math.round(p1);
  $('.OprationalStations').circleProgress({
 value: x1 / 100,
     lineCap: 'round',
    fill: {color: '#ffa500'}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round( x1 * progress) + '<i>%</i>');
  });
})(jQuery);


(function($) {
var station2 = $total;
var abc2=free;
var p2 = (abc2 * 100) / station2 ;
var x2 = Math.round(p2);
  $('.FreeStation').circleProgress({
 value: x2 / 100,
     lineCap: 'round',
    fill: {color: '#ffa500'}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round( x2 * progress) + '<i>%</i>');
  });
})(jQuery);

</script>";
	}

	$array = array('output' => $output,'operational' => $operational,'free' => $free,'total' => $total);
	echo json_encode($array);
mysqli_close($conn);

?>