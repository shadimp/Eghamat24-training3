    <?php
	$id = $_GET['id'];
	include('../config/conn.php');
	mysqli_query($conn, "delete from `payment_document` where id='$id'");
	// header('location:../index.php?page=customer_payment');	
	?>