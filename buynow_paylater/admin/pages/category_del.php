    <?php
    	$id=$_GET['id'];
    	include('../config/conn.php');
    	mysqli_query($conn,"delete from `categories` where id='$id'");
		header('location:../index.php?page=category_list');
    	
    ?>