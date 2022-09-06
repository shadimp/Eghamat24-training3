<div class="main" style="direction: rtl;">

    <?php

    include('config/conn.php');
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from `services` where id='$id'");
    $row = mysqli_fetch_array($query);

    ?>

    <form method="POST" action="pages/....php" class="">
        <ul>
            <li>
                <h2> نام خدمات دهنده: <?php echo $row['user_id']; ?> </h2>
                <h2>شرح خدمت: <?php echo $row['description']; ?></h2>
                <h4>تعداد اقساط: <?php echo $row['pay_number']; ?></h4>
                <h4>مبلغ هر قسط : <?php echo $row['price']; ?></h4>
            </li>
            <input type="submit" name="register_order" value="ثبت سفارش ">
        </ul>
        
    </form>
    <?php

    ?>




</div>