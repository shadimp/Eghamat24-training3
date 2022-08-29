    <?php
    
    include('../config/conn.php');
    $id = $_GET['id'];

    $cat_name = $_POST['cat_name'];

    mysqli_query($conn, "update `category` set  cat_name='$cat_name' where catid='$id'");
    header('location:../index.php?page=admin-cat');
  
    ?>