    <?php
	$id = $_GET['id'];
	include('../config/conn.php');
	mysqli_query($conn, "delete from `services` where id='$id'");
	header('location:../index.php?page=service_list');	
	?>