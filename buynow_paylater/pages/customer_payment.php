<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" href="../css/customerstyle.css">
</header>
<head>
    <title> پرداخت</title>
    
</head>

<body>
    <?php
    
    $order_id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];
    $installment_pay_number = $_GET['installment_pay_number'];
    $price = $_GET['price'];
    $seller_name = $_GET['seller_name'];
    $service_id = $_GET['service_id'];
    ?>
    <div class="column">
        <form class="form1">
            <h4> اطلاعات خرید</h4>
            <label>کد سفارش :</label><label name="order_id"><?php echo $order_id; ?></label><br><br>
            <label>نام فروشنده:</label><label><?php echo $seller_name; ?></label><br><br>
            <label>کدخدمت:</label><label><?php echo $service_id; ?></label><br><br>
            <label>عنوان خدمت:</label><label><?php echo $title; ?></label><br><br>
            <label>شرح خدمت :</label><label><?php echo $description; ?></label><br><br>
            <label>تعداد قسط :</label><label><?php echo $installment_pay_number; ?></label><br><br>
            <label> مبلغ هر قسط:</label><label><?php echo $price; ?> ریال</label><br><br>

        </form>
    </div>
    <div class="column">
        <form action="upload_document.php?order_id= <?php echo $order_id; ?>" method="post" enctype="multipart/form-data" class="form1">
            <!-- <label> عنوان خدمات</label><br><input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
            <label name="order_id">کد سفارش : <?php echo $order_id; ?></label> -->
            <p style="direction:rtl">تصویر چک رابارگزاری کنید :</p><br>
            <label>شماره سریال چک</label><br><input type="text" name="check_serial"><br><br>
            <label>شماره واگذاری چک</label><br><input type="text" name="check_vagozari_serial"><br><br>
            <label>تاریخ چک</label><br><input type="text" name="check_date"><br><br>
            <input type="file" name="image_path" id="fileToUpload">
            <input type="submit" value=" بارگزاری تصویر چک" name="submit">
        </form>
    </div>

    <br> <br> <br> <br> <br>

    <table border="1" class="column" >
        <thead>
            <th>ردیف</th>
            <th>شماره سریال چک</th>
            <th>تاریخ چک</th>
            <th>شماره واگذاری</th>
            <th>تصویر</th>
            <th>حذف</th>
        </thead>
        <tbody>
            <?php
            include('../config/conn.php');
            $query = mysqli_query($conn, "select * from `payment_document`where order_id='$order_id'");
            $i=0;
            while ($row = mysqli_fetch_array($query)) {$i+=1;
            ?>
            <tr>
                <td><?php echo $i; ?></td>              
                <td><?php echo $row['check_serial']; ?></td>
                <td><?php echo $row['check_date']; ?></td>
                <td><?php echo $row['check_vagozari_serial']; ?></td>
                <td><?php echo $row['image_path']; ?></td>
                <td align="center"><a href="delete-payment_document.php?id=<?php echo $row['id']; ?>"><img src="photos/del.png" alt="del" /></a></td> 

            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>