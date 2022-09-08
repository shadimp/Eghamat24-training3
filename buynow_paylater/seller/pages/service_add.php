<?php
include('../config/conn.php');

$category_id = $_POST['category_id'];
$installment_pay_number = $_POST['installment_pay_number'];
$price = $_POST['price'];
$title = $_POST['title'];
$description = $_POST['description'];

if (!empty($category_id)) {
	
	 mysqli_query($conn, "insert into `services` (user_id,category_id,title,description,installment_pay_number,price) 
	                                      values ('1001','$category_id','$title','$description','$installment_pay_number','$price')");	
}

 header('location:../index.php?page=service_list');
