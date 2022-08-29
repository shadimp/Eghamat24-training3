<?php
include('../config/conn.php');
$newsid = $_GET['newsid'];
$query = mysqli_query($conn, "select * from `newscontent` where newsid='$newsid'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
   
</head>

<body>
    <h2> ویرایش متن خبر</h2>
    
        <form method="POST" action="update-content.php?id=<?php echo $newsid; ?>">
            <label>شماره خبر:</label><input type="text" value="<?php echo $row['newsid']; ?>" name="newsid"><br><br>
            <label>شماره دسته خبر:</label><input type="text" value="<?php echo $row['catid']; ?>" name="catid"><br><br>
            <label>عتوان خبر:</label><input type="text" value="<?php echo $row['newstitle']; ?>" name="newstitle"><br><br>
            <label>خلاصه خبر:</label><input type="textarea" value="<?php echo $row['summery']; ?>" name="summery"><br><br>
            <label> متن کامل خبر:</label><input type="textarea" value="<?php echo $row['fullcontent']; ?>" name="fullcontent"><br><br>
            <input type="submit" name="add" value="ثبت تغییرات">
        </form>
   
</body>

</html>