    <?php
    
    include('../config/conn.php');
    $id = $_GET['id'];

    $name = $_POST['name'];

    mysqli_query($conn, "update `categories` set  name='$name' where id='$id'");
    header('location:../index.php?page=category_list');
  
    ?>