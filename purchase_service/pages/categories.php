<div class="main" style="direction: rtl">

    <?php
    include('config/conn.php');
    $category_no = $_GET['category_no'];
    $query = mysqli_query($conn, "select * from `services` where category_no='$category_no'");
    while ($row = mysqli_fetch_array($query)) {

        $id = $row['id'];
    ?>
        <ul>
            <li>
                <h2><a href="index.php?page=details&id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?></h2></a>
                <h4><?php echo $row['description']; ?></h4>
                <h4><label>تعداد اقساط : </label> <?php echo $row['pay_number']; ?></h4>
                <h4><label>مبلغ هر قسط :</label> <?php echo $row['price']; ?> <label> ریال </label> </h4>
            </li>
        </ul>

    <?php
    }
    ?>




</div>