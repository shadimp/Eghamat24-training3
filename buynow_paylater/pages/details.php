<div class="main" style="direction: rtl;">

    <?php
    include('config/conn.php');
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from `services` where id='$id'");
    $row = mysqli_fetch_array($query);
    //if order_state =1
    // $query2 = mysqli_query($conn, "select * from `order_register` where service_id='$id'");
    // $row2 = mysqli_fetch_array($query2);
    // if ($row['service_id']=='1') {
    //     echo "سفارش شما به کد " . $id . "ثبت شد";
    // }
    ?>
    <form method="POST" action="pages/order_register.php?id=<?php echo $row['id']; ?>" class="">
        <ul>
            <li <h2> نام خدمات دهنده: <?php echo $row['user_id']; ?> </h2>
                <h2> کد خدمت : <?php echo $row['id']; ?> </h2>
                <h2>شرح خدمت: <?php echo $row['description']; ?></h2>
                <h4>تعداد اقساط: <?php echo $row['installment_pay_number']; ?></h4>
                <h4>مبلغ هر قسط : <?php echo $row['price']; ?></h4>
            </li>
            <input type="submit" name="register_order" value="ثبت سفارش ">
        </ul>

    </form>
</div>