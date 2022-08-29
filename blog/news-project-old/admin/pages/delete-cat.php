    <?php
    	$id=$_GET['id'];
    	include('../config/conn.php');
    	mysqli_query($conn,"delete from `category` where catid='$id'");
		header('location:../index.php?page=admin-cat');
    	
    ?>