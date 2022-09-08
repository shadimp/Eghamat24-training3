<?php
include('../config/conn.php');

$customer_id = '3001';
$seller_id = '1001';
$service_id = $_GET['id'];
$order_send = '1';
$confirm_state = '0';
$payment_state = '0';

if (!empty($service_id)) {
	$query = mysqli_query($conn, "select * from `order_register` where customer_id='$customer_id' and service_id='$service_id'");
	$row = mysqli_fetch_array($query);
	if ($row !== null) {
		echo "already exists ";
	} else {
		mysqli_query($conn, "insert  into `order_register` (customer_id,seller_id,service_id,order_send,confirm_state,payment_state) 
	                                                   values ('3001','1001','$service_id','$order_send','$confirm_state','$payment_state')");
	}
}

header('location:../index.php?page=details&id=' . $service_id);
