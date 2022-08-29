<?php
// $db = new SQLite3('myblog.db');

// $db->query("
//     CREATE TABLE IF NOT EXISTS categories (
//         id INTEGER PRIMARY KEY AUTOINCREMENT,
//         title TEXT NOT NULL,
//         havesubgroup TEXT NOT NULL
//     );
// ");

// $db->query("
//     INSERT INTO categories (title, havesubgroup) VALUES
//     ('ورزشی', '0'),
//     ('سیاسی', '0');
// ");
?>
<?php require_once('../header.php'); ?>
<div style="margin-top: 100px; margin-bottom: 50px; height:300px;">
    <div>
        <!-- action="pages/add-cat.php" -->
        <form method="POST" action="sqliteadd.php" style="width:30% ;">
            <label>نام دسته خبر:</label><input type="text" name="cat_name">
            <input type="submit" name="add" value="add">
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
                $db = new SQLite3('myblog.db');
                $results = $db->query("    SELECT *  FROM categories");

                while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td align="center"><a href="edit-sqlite.php?id=<?php echo $row['id']; ?>"><img src="photos/edit.png" alt="edit" /></a></td>
                        <td align="center"><a href="delete-sqlite.php?id=<?php echo $row['id']; ?>"><img src="photos/del.png" alt="delete" /></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once('../footer.php');?>
</body>
</html>