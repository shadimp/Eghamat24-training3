    <!DOCTYPE html>
    <html>

    <head>
        <title>دسته خبر</title>
    </head>

    <body>
        <div>
        <!-- action="pages/add-cat.php" -->
            <form method="POST" action="pages/sqliteread.php" style="width:30%">
                <label>نام دسته خبر:</label><input type="text" name="cat_name">
                <input type="submit" name="add" >
            </form>
        </div>
        <br>
        <div>
            <table border="1">
                <thead>
                    <th>شماره</th>
                    <th>نام دسته خبر</th>
                    <th>ویرایش</th>
                    <td>حذف</td>
                </thead>
                <tbody>
                    <?php
                    include('config/conn.php');
                    $query = mysqli_query($conn, "select * from `category`");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['catid']; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td align="center"><a href="pages/edit-cat.php?id=<?php echo $row['catid']; ?>"><img src="photos/edit.png" alt="edit" /></a></td>
                            <td align="center"><a href="pages/delete-cat.php?id=<?php echo $row['catid']; ?>"><img src="photos/del.png" alt="delete" /></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>