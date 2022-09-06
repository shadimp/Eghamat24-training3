    <?php

    include('../config/conn.php');
    $id = $_GET['id'];
    $category_no = $_POST['category_no'];
    $pay_number = $_POST['pay_number'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    mysqli_query($conn, "update `services` set  category_no='$category_no',pay_number='$pay_number',price='$price',title='$title',description='$description' where id='$id'");
    header('location:../index.php?page=service_list');
   
    ?>