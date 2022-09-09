<?php
include('../config/conn.php');
session_start();
$name=$_SESSION["username"];
$query = mysqli_query($conn, "SELECT id  FROM users  where username='$name';");
$row = mysqli_fetch_array($query);
$customer_id=$row['id'];
//

$seller_id =  $_GET['seller_id'];
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
	                                                   values ('$customer_id','$seller_id','$service_id','$order_send','$confirm_state','$payment_state')");
	}
}

 header('location:../index.php?page=details&id=' . $service_id);
