<?php

$cat_name = $_POST['cat_name'];
$db = new SQLite3('myblog.db');
// echo ($cat_name);
$db->query("
    INSERT INTO categories (title, havesubgroup) VALUES
    ('$cat_name', '0');    
");
 header('location: sqliteread.php');

?>