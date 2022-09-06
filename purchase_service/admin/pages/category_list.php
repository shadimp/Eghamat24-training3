<!DOCTYPE html>
<html>

<head>
    <title>دسته خدمات</title>
</head>

<body>
    <div style=" margin-right: 30px;">
        <div>
            <form method="POST" action="pages/category_add.php" style="width:30%">
                <label>نام دسته خدمات:</label><input type="text" name="name">
                <input type="submit" name="add">
            </form>
        </div>
        <br>
        <div>
            <table border="1">
                <thead>
                    <th>شماره</th>
                    <th>نام دسته خدمات</th>
                    <th>ویرایش</th>
                    <td>حذف</td>
                </thead>
                <tbody>
                    <?php
                    include('../config/conn.php');
                    $query = mysqli_query($conn, "select * from `categories`");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td align="center"><a href="pages/category_edit.php?id=<?php echo $row['id']; ?>"><img src="photos/edit.png" alt="edit" /></a></td>
                            <td align="center"><a href="pages/category_del.php?id=<?php echo $row['id']; ?>"><img src="photos/del.png" alt="delete" /></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>