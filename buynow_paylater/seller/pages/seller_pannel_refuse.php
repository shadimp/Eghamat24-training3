<!DOCTYPE html>
<html>

<head>

    <title> سرویس</title>
    <style>
        th {
            background-color: #B7F8DB;
        }

        tr:nth-child(even) {
            background-color: #B7F8DB;
        }

        .form1 {
            margin: 0;
            border-radius: 5px;
            background-color: #B7F8DB;
            padding: 20px;
            width: 800px;
        }

        * {
            box-sizing: border-box;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .mytable {

            direction: rtl;
            background-color: white;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body style="direction:rtl ;">
<h3>سفارشات رد شده</h3>
    <table border="1" class="mytable">
        <thead>
            <th> نام خریدار</th>
            <th>کدخدمت</th>
            <th> دسته خدمت</th>
            <th> عنوان خدمت</th>
            <th> شرح خدمت</th>
            <th> تعداد اقساط</th>
            <th> مبلغ هر قسط </th>
            <th>کد سفارش</th>
           
        </thead>
        <tbody>
            <?php
            include('config/conn.php');
            $query = mysqli_query($conn, "SELECT order_register.customer_id,order_register.id as orderid,services.id,services.category_id,
            services.title,services.description,services.installment_pay_number,services.price,categories.name as category_name
            FROM services INNER JOIN order_register ON services.id = order_register.service_id INNER JOIN categories on services.category_id = categories.id
            where order_register.order_refuse='1';
            ");

            while ($row = mysqli_fetch_array($query)) {

                $customer_id=$row['customer_id'];
                $query2 = mysqli_query($conn, "select fullname from `users` where id='$customer_id'");
                $row2 = mysqli_fetch_array($query2)
            ?>
                <tr>
                    <td><?php echo $row2['fullname']; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>                   
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['installment_pay_number']; ?></td>
                    <td><?php echo $row['price']; ?></td> 
                    <td><?php echo $row['orderid']; ?></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>