<?php
$id = $_GET['id'];
$db = new SQLite3('myblog.db');

echo ($cat_name);
$db->query("
    delete from categories where id='$id'");
header('location: sqliteread.php');
