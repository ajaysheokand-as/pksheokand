<?php
include('config.php');
$name = $_POST['bank_name'];
$village = $_POST['village'];

$sql = "INSERT INTO bank_details (bank_name, village)
VALUES ('$name', '$village')";

if ($con->query($sql) === TRUE) {
	//alert("Added Successfully");
	header('location:bill.php');
	exit();
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

?>