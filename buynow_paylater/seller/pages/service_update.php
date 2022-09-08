    <?php

    include('../config/conn.php');
    $id = $_GET['id'];
    $category_id = $_POST['category_id'];
    $installment_pay_number = $_POST['installment_pay_number'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    mysqli_query($conn, "update `services` set  category_id='$category_id',installment_pay_number='$installment_pay_number',price='$price',title='$title',description='$description' where id='$id'");
    header('location:../index.php?page=service_list');
   
    ?>