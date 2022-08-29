<?php

$connection = mysqli_connect("localhost", "root", "");

// if (mysqli_connect_errno()) {
//     echo "MySQL Connection Failed: " . mysqli_connect_error();
//     die();
// }

// $query = "CREATE DATABASE news_db DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
// if (mysqli_query($connection, $query)) {
//     echo "db Created Successfully!";
// } else {
//     echo "Error: " . mysqli_error($conn);
// }


//  $connection = mysqli_connect("localhost", "root", "","news_db");

// $query = "CREATE TABLE news_db.category( catid INT AUTO_INCREMENT PRIMARY KEY,cat_name CHAR(255) )";
// if (mysqli_query($connection, $query)) {
//     echo "Table category Created Successfully!";
// } else {
//     echo "Error: " . mysqli_error($connection);
// }

// $query = "CREATE TABLE newscontent( id int AUTO_INCREMENT PRIMARY KEY, newsid int,catid int ,newstitle varchar(100),summery text ,fullcontent text)";
// if (mysqli_query($connection, $query)) {
//     echo "Table Created Successfully!";
// } else {
//     echo "Error: " . mysqli_error($connection);
// }
$query = "CREATE TABLE news_db.newsimages( id int AUTO_INCREMENT PRIMARY KEY, newsid int ,imagepath varchar(100))";
if (mysqli_query($connection, $query)) {
    echo "Table newsimages Created Successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}

?>