<?php
include('../config/conn.php');

$newsid = $_POST['newsid'];
$newstitle = $_POST['newstitle'];
$catid = $_POST['catid'];
$summery = $_POST['summery'];
$fullcontent = $_POST['fullcontent'];

if (!empty($newsid)) {
	
	 mysqli_query($conn, "insert into `newscontent` (id,newsid,newstitle,catid,summery,fullcontent) values (DEFAULT,'$newsid','$newstitle','$catid','$summery','$fullcontent')");	
}

 header('location:../index.php?page=admin-content');
