<div class="main" style="direction: rtl">

    <?php
    include('config/conn.php');
    $query = mysqli_query($conn, "select * from `services` limit 10");
    while ($row = mysqli_fetch_array($query)) {

        $id = $row['id'];
    ?>
        <ul>
            <li>
                <h2><a href="index.php?page=details&id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?></h2></a>
                <h4><?php echo $row['description']; ?></h4></a>
            </li>
        </ul>

    <?php
    }
    ?>

</div>