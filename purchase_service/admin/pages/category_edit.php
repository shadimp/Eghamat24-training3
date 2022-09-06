    <?php
    include('../config/conn.php');
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from `categories` where id='$id'");
    $row = mysqli_fetch_array($query);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>دسته خدمات</title>
    </head>

    <body>
        <h2>ویرایش</h2>
        <form method="POST" action="category_update.php?id=<?php echo $id; ?>">
            <label>نام دسته:</label><input type="text" value="<?php echo $row['name']; ?>" name="name">
            <input type="submit" name="submit"><br><br>
            <a href="../index.php?page=category_list">بازگشت</a>
        </form>
    </body>

    </html>