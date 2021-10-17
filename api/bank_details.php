<?php 
include('../config.php');
$data = json_decode(file_get_contents("php://input"),true) ;
//echo ($data['name']);
$bill_no = $data['bill_no'];
$bank_id = $data['bank_id'];
$grand_total = $data['grand_total'];
$bank_status = $data['bill_status'];
$gst= $data['gst'];

//print_r($data);
// $lawyer_fee = $data['lawyer_fee'];
// $expencies = $data['expencies'];
// $total_fee = $data['total_fee'];
// $ac_no = $data['ac_no'];
// $bill_type = $data['bill_type'];
// $bank_id = $data['bank_id'];
// $bill_no = $data['bill_no'];
//$total = $grand_total + ($grand_total * $gst)/100;
  $sql = "INSERT INTO `bank`(`bank_id`,  `bill_no`, `gst`, `grand_total`, `bill_status`) VALUES ($bank_id,$bill_no,$gst,$grand_total,'$bank_status')";
if(mysqli_query($con,$sql))
	echo json_encode(array(
		"success"=>true,
		"error"=>""
	));
else
	echo json_encode(array(
		"success"=>false,
		"error"=>mysqli_error($con)
	));
?>

