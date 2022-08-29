    <?php
	$newsid = $_GET['newsid'];
	include('../config/conn.php');
	mysqli_query($conn, "delete from `newscontent` where newsid='$newsid'");
	header('location:../index.php?page=admin-content');
	
	?>