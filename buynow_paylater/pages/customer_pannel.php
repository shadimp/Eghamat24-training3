<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="css/customer_pannel.css">
</header>

<head>

    <title> سرویس</title>

</head>

<body style="direction:rtl ;">
    <h3>سفارشات تایید شده</h3>
    <table border="1" class="mytable">
        <thead>
            <th> نام فروشنده</th>
            <th>کدخدمت</th>
            <th> دسته خدمت</th>
            <th> عنوان خدمت</th>
            <th> شرح خدمت</th>
            <th> تعداد اقساط</th>
            <th> مبلغ هر قسط </th>
            <th>کد سفارش</th>
            <th> پرداخت</th>
        </thead>
        <tbody>
            <?php
            include('config/conn.php');
            
            $name = $_SESSION["username"];
            $query = mysqli_query($conn, "SELECT id  FROM users  where username='$name';");
            $row = mysqli_fetch_array($query);
            $customer_id = $row['id'];
            //
            $query = mysqli_query($conn, "SELECT order_register.customer_id, order_register.seller_id,order_register.id as orderid,services.id,services.category_id,
            services.title,services.description,services.installment_pay_number,services.price,categories.name as category_name
            FROM services INNER JOIN order_register ON services.id = order_register.service_id INNER JOIN categories on services.category_id = categories.id
            where order_register.confirm_state='1' and order_register.order_send='1' and customer_id='$customer_id';
            ");

            while ($row = mysqli_fetch_array($query)) {

                $seller_id = $row['seller_id'];
                $query2 = mysqli_query($conn, "select username from `users` where id='$seller_id'");
                $row2 = mysqli_fetch_array($query2)
            ?>
                <tr>
                    <td><?php echo $row2['username']; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['installment_pay_number']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['orderid']; ?></td>

                    <td align="center"><a href="pages/customer_payment.php?id=<?php echo $row['orderid']; ?>
                     &title=<?php echo $row['title']; ?>&description=<?php echo $row['description']; ?>
                     &installment_pay_number=<?php echo $row['installment_pay_number']; ?>
                    &price=<?php echo $row['price']; ?>&seller_name=<?php echo $row2['username']; ?>
                    &service_id=<?php echo $row['id']; ?> "> پرداخت</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>