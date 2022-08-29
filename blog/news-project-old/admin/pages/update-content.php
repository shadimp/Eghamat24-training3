    <?php

    include('../config/conn.php');
    $newsid = $_GET['newsid'];

  
    $newsid = $_POST['newsid'];
    $catid = $_POST['catid'];
    $newstitle = $_POST['newstitle'];
    $summery = $_POST['summery'];
    $fullcontent = $_POST['fullcontent'];

    mysqli_query($conn, "update `newscontent` set newsid='$newsid', catid='$catid',newstitle='$newstitle',summery='$summery',fullcontent='$fullcontent' where newsid='$newsid'");
    header('location:../index.php?page=admin-content');
   
    ?>