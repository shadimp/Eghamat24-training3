<?php

$id = $_GET['id'];
$db = new SQLite3('myblog.db');
$results = $db->query("SELECT *FROM categories where id='$id'");
$row = $results->fetchArray(SQLITE3_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <title>دسته خبر</title>
</head>

<body>
    <h2>ویرایش</h2>
    <form method="POST" action="update-sqlite.php?id=<?php echo $id; ?>">
        <label>نام دسته:</label><input type="text" value="<?php echo $row['title']; ?>" name="title">
        <input type="submit" name="submit"><br><br>
        <!-- <a href="admin-cat.php">بازگشت</a> -->
    </form>
</body>

</html>