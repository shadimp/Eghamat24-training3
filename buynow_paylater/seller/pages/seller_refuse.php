<?php

include('../config/conn.php');
$orderid = $_GET['id'];
mysqli_query($conn, "update `order_register` set  order_refuse='1' where id='$orderid'");
header('location:../index.php?page=seller_pannel');

?>