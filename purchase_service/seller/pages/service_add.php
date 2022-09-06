<?php
include('../config/conn.php');

$category_no = $_POST['category_no'];
$pay_number = $_POST['pay_number'];
$price = $_POST['price'];
$title = $_POST['title'];
$description = $_POST['description'];

if (!empty($category_no)) {
	
	 mysqli_query($conn, "insert into `services` (user_id,category_no,title,description,pay_number,price) 
	                                      values ('1001','$category_no','$title','$description','$pay_number','$price')");	
}

 header('location:../index.php?page=service_list');
