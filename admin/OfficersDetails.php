<?php 

$output = '';

$conn = mysqli_connect('localhost','root','','crms');

	$sql = "SELECT COUNT(`officer_id`) FROM officer";
	$result = mysqli_query($conn,$sql);

	$sql1 = "SELECT COUNT(`officer_id`) FROM officer WHERE `ps_id` != 0";
	$result1 = mysqli_query($conn,$sql1);
	while ($row1 = mysqli_fetch_assoc($result1)) {
		$onduty = $row1['COUNT(`officer_id`)'];
	};

	$sql2 = "SELECT COUNT(`officer_id`) FROM officer WHERE `ps_id` = 0";
	$result2 = mysqli_query($conn,$sql2);
	while ($row2 = mysqli_fetch_assoc($result2)) {
		$offduty = $row2['COUNT(`officer_id`)'];
	};

	while ($row = mysqli_fetch_assoc($result)) {

		$total = $row['COUNT(`officer_id`)'];

	$output .= "
	<script>
	var totalOfficers = '".$row['COUNT(`officer_id`)']."';
var ondutyOfficers = $onduty;
var offDutyOfficers = $offduty;

(function($) {
var officer1 = totalOfficers;
var abc1= ondutyOfficers;
var p1 = (abc1 * 100) / officer1 ;
var x1 = Math.round(p1);
  $('.ondutyOfficers ').circleProgress({
 value: x1 / 100,
     lineCap: 'round',
    fill: {color: '#ffa500'}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round( x1 * progress) + '<i>%</i>');
  });
})(jQuery);


(function($) {
var officer2 = totalOfficers;
var abc2=offDutyOfficers;
var p2 = (abc2 * 100) / officer2 ;
var x2 = Math.round(p2);
  $('.offduty').circleProgress({
 value: x2 / 100,
     lineCap: 'round',
    fill: {color: '#ffa500'}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round( x2 * progress) + '<i>%</i>');
  });
})(jQuery);

</script>";
	}

	$array = array('onduty' => $onduty,'offduty' => $offduty,'total' => $total,'output' => $output,);
	echo json_encode($array);
mysqli_close($conn);

?>