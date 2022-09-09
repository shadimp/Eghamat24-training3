<?php
include('../config/conn.php');
 session_start();   
 
$category_id = $_POST['category_id'];
$installment_pay_number = $_POST['installment_pay_number'];
$price = $_POST['price'];
$title = $_POST['title'];
$description = $_POST['description'];
//
$seller_name=$_SESSION["username"];
$query = mysqli_query($conn, "SELECT id  FROM users  where username='$seller_name';");
$row = mysqli_fetch_array($query);
$seller_id=$row['id'];


if (!empty($category_id)) {
	
	 mysqli_query($conn, "insert into `services` (seller_id,category_id,title,description,installment_pay_number,price) 
	                                      values ('$seller_id','$category_id','$title','$description','$installment_pay_number','$price')");	
}

 header('location:../index.php?page=service_list');
