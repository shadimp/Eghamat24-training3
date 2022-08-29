<div class="main" style="direction: rtl">

    <?php
    include('config/conn.php');
    $query = mysqli_query($conn, "select * from `newscontent` limit 10");
    while ($row = mysqli_fetch_array($query)) {
        $newsid = $row['newsid'];
    ?>
        <ul><?php
            $query2 = mysqli_query($conn, "select * from `newsimages` where newsid= '$newsid'");
            $row2 = mysqli_fetch_array($query2);

            ?>
            <li>
                <img src="<?php echo $row2['imagepath']; ?>" style="width: 100px; height: 100px;"> </a>
                <h2><a href="index.php?page=details&newsid=<?php echo $row['newsid']; ?>"> <?php echo $row['newstitle']; ?></h2></a>
            </li>
            <li>
                <h4><?php echo $row['summery']; ?></h4>
            </li>

        </ul>

    <?php
    }
    ?>




</div>