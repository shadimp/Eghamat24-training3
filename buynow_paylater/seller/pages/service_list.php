    <!DOCTYPE html>
    <html>
    <header>
        <link rel="stylesheet" href="css/service_style.css">
    </header>

    <head>

        <title> سرویس</title>

    </head>

    <body style="direction:rtl ;">
        <?php
        include('config/conn.php');
        $query = mysqli_query($conn, "select * from `categories`");
        ?>

        <div>
            <form method="POST" action="pages/service_add.php" class="form1">
                <label> گروه خدمات</label><br>
                <select name="category_id">
                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                        <OPtion value="<?= $row['id'] ?>"><?= $row['name'] ?></OPtion>
                    <?php } ?>
                </select><br>
                <label> عنوان خدمات</label><br><input type="text" name="title"><br>
                <label> شرح کامل خدمت</label><br><textarea type="textarea" name="description" rows="2" cols="70"></textarea><br>
                <label> شیوه پرداخت </label>
                <select name="installment_pay_number" id="installment_pay_number">
                    <optgroup label="نقد">
                        <option value="1">نقد</option>
                    </optgroup>
                    <optgroup label="اقساط">
                        <option value="2">2 ماهه </option>
                        <option value="3">3 ماهه</option>
                        <option value="4">4 ماهه</option>
                        <option value="4">5 ماهه</option>
                        <option value="4">6 ماهه</option>
                    </optgroup>
                </select>
                <br><br>
                <label>قیمت </label><input type="textarea" name="price"><br>
                <input type="submit" name="add" value="افزودن خدمت">
            </form>
        </div>

        <table border="1" class="mytable">
            <thead>
                <th>کدخدمت</th>
                <th>شماره فروشنده</th>
                <th> دسته خدمات</th>
                <th> عنوان خدمت</th>
                <th> شرح خدمت</th>
                <th> تعداد اقساط</th>
                <th> مبلغ هر قسط </th>
                <th>ویرایش</th>
                <th>حذف</th>
            </thead>
            <tbody>
                <?php
                include('config/conn.php');
                $seller_name = $_SESSION["username"];
                $query = mysqli_query($conn, "SELECT id  FROM users  where username='$seller_name';");
                $row = mysqli_fetch_array($query);
                $seller_id = $row['id'];
                $query = mysqli_query($conn, "select * from `services` where seller_id='$seller_id'");

                while ($row = mysqli_fetch_array($query)) {
                    $category_id = $row['category_id'];
                    $query2 = mysqli_query($conn, "select name from `categories` where id='$category_id'");
                    $row2 = mysqli_fetch_array($query2)
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['seller_id']; ?></td>
                        <!-- <td><?php echo $row['category_id']; ?></td> -->
                        <td><?php echo $row2['name']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['installment_pay_number']; ?></td>
                        <td><?php echo $row['price']; ?></td>

                        <td align="center"><a href="pages/service_edit.php?id=<?php echo $row['id']; ?>"><img src="photos/edit.png" alt="edit" /></a></td>
                        <td align="center"><a href="pages/service_del.php?id=<?php echo $row['id']; ?>"><img src="photos/del.png" alt="del" /></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </body>

    </html>