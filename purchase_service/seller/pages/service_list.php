    <!DOCTYPE html>
    <html>

    <head>

        <title> سرویس</title>
        <style>
            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .form1 {
                margin: 0;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                width: 800px;
            }

            * {
                box-sizing: border-box;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .mytable {

                direction: rtl;
                background-color: white;
                padding: 20px;
                width: 100%;
            }
        </style>
    </head>

    <body style="direction:rtl ;">

        <div>
            <form method="POST" action="pages/service_add.php" class="form1">
                <label> گروه خدمات</label><br><input type="text" name="category_no"><br>
                <label> عنوان خدمات</label><br><input type="text" name="title"><br>
                <label> شرح کامل خدمت</label><br><textarea type="textarea" name="description" rows="2" cols="70"></textarea><br>
                <label> شیوه پرداخت </label>
                <select name="pay_number" id="pay_number">
                    <optgroup label="نقد">
                        <option value="1" >نقد</option>
                    </optgroup>
                    <optgroup label="اقساط">
                        <option value="2">2 ماهه </option>
                        <option value="3" selected>3 ماهه</option>
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
                <th>ردیف</th>
                <th>شماره فروشنده</th>
                <th>شماره دسته خدمات</th>
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
                $query = mysqli_query($conn, "select * from `services`");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['category_no']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['pay_number']; ?></td>
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