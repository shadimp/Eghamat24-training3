<?php
include('../config/conn.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "select * from `services` where id='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body style="direction:rtl;">
    <?php
    // include('../config/conn.php');
    $query2 = mysqli_query($conn, "select * from `categories`");
    ?>
    <h2> ویرایش خدمت</h2>
    <form method="POST" action="service_update.php?id=<?php echo $id; ?>">
        <label> گروه خدمات</label><br>
        <select name="category_id">
            <?php while ($row2 = mysqli_fetch_array($query2)) { ?>
                <OPtion value="<?= $row2['id'] ?>"><?= $row2['name'] ?></OPtion>
            <?php } ?>
        </select><br>
        <label> عنوان خدمات</label><br><input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
        <label> شرح کامل خدمت</label><br><textarea type="textarea" name="description" rows="4" cols="90"><?php echo $row['description']; ?></textarea><br>
        <label>تعداد اقساط </label>
        <!-- <?php $selected = $row['installment_pay_number']; ?> -->
        <select name="installment_pay_number" id="installment_pay_number">">
            <option value="1">نقد</option>
            <option value="2">2 ماهه</option>
            <option value="3">3 ماهه</option>
            <option value="4">4 ماهه</option>
            <option value="4">5 ماهه</option>
            <option value="4">6 ماهه</option>
        </select>
        <label>قیمت </label><br><input type="textarea" name="price" value="<?php echo $row['price']; ?>"><br>
        <input type="submit" name="add" value="ثبت تغییرات">
    </form>
</body>

</html>