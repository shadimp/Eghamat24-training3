<?php

include('../config/conn.php');

$name = $_POST['name'];

if (!empty($name)) {

	mysqli_query($conn, "insert into `categories` (name) values ('$name')");
}
header('location:../index.php?page=category_list');
