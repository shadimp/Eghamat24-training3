<?php
    
    $id = $_GET['id'];

    $title = $_POST['title'];

    $db = new SQLite3('myblog.db');
    echo ($title);
    $db->query("
        update `categories` set  title='$title' where id='$id' ");
     header('location: sqliteread.php');
   
  
    ?>