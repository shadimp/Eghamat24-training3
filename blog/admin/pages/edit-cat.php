    <?php
    include('../config/conn.php');
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from `category` where catid='$id'");
    $row = mysqli_fetch_array($query);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>دسته خبر</title>
    </head>

    <body>
        <h2>ویرایش</h2>
        <form method="POST" action="update-cat.php?id=<?php echo $id; ?>">
            <label>نام دسته:</label><input type="text" value="<?php echo $row['cat_name']; ?>" name="cat_name">
            <input type="submit" name="submit"><br><br>
            <a href="admin-cat.php">بازگشت</a>
        </form>
    </body>

    </html>