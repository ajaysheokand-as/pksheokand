<?php 
include('../config.php');
$data = json_decode(file_get_contents("php://input"),true) ;
//echo ($data['name']);
$name = $data['name'];
$f_name = $data['f_name'];
$village = $data['village'];
$due_amt = $data['due_amt'];
$due_date = $data['due_date'];
$lawyer_fee = $data['lawyer_fee'];
$expencies = $data['expencies'];
$total_fee = $data['total_fee'];
$ac_no = $data['ac_no'];
$bill_type = $data['bill_type'];
$bank_id = $data['bank_id'];
$bill_no = $data['bill_no'];
//print_r($data);
$sql = "INSERT INTO `bill`(`ac_no`, `bill_type`, `name`, `f_name`, `village`, `due_amt`, `due_date`, `lawyer_fee`, `expencies`, `total_fee`,`bank_id`,`bill_no`) VALUES ($ac_no,'$bill_type','$name','$f_name','$village',$due_amt,'$due_date',$lawyer_fee,$expencies,$total_fee,$bank_id,$bill_no)";
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

