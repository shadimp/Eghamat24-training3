<!DOCTYPE html>
<html>

<head>

    <title>متن خبر</title>
    <style>
        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .form1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
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

        .column {
            float: right;
            width: 50%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="column">
        <form class="form1">
            اطلاعات خرید
        </form>
    </div>
    <div class="column">
        <form action="pages/upload.php" method="post" enctype="multipart/form-data" class="form1">
            <p style="direction:rtl">تصویر چک رابارگزاری کنید :</p><br>
            <label>شماره خبر</label><br><input type="text" name="newsid"><br><br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <br> <br> <br> <br> <br>

    <table border="1" class="mytable">
        <thead>
            <th>ردیف</th>
            <th>شماره چک</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </thead>
        <tbody>
            <?php
            include('config/conn.php');
            $query = mysqli_query($conn, "select * from `payment_document`");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['orderid']; ?></td>
                    <td><?php echo $row['check_serialnumber']; ?></td>
                    <td><?php echo $row['check_image']; ?></td>

                    <!-- <td align="center"><a href="pages/edit-content.php?newsid=<?php echo $row['newsid']; ?>"><img src="photos/edit.png" alt="edit" /></a></td>
                        <td align="center"><a href="pages/delete-content.php?newsid=<?php echo $row['newsid']; ?>"><img src="photos/del.png" alt="del" /></a></td> -->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>