<?php
include('../config/conn.php');

$order_id = $_GET['order_id'];
$check_date = $_POST['check_date'];
$check_vagozari_serial = $_POST['check_vagozari_serial'];
$check_serial = $_POST['check_serial'];
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $image_path = $_POST['image_path'];
echo basename($_FILES["image_path"]["name"]);
////
$target_dir = "../check_image_uploads/";
$target_file = $target_dir . basename($_FILES["image_path"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image_path"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image_path"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
 

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
    echo "فایل ". basename( $_FILES["image_path"]["name"]). " بارگزاری شد
    .";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
include('../config/conn.php');
//insert into image table
$target_dir = "../check_image_uploads/";
$target_file = $target_dir . basename($_FILES["image_path"]["name"]);

 //check if image is registered before
$query = mysqli_query($conn, "select * from `payment_document` where order_id='$order_id' and check_serial='$check_serial'");
$row = mysqli_fetch_array($query);

 if (!empty($order_id)&& !isset($row['id'])) {
	
	 mysqli_query($conn, "INSERT INTO `payment_document`( `order_id`, `check_date`, `check_vagozari_serial`, `check_serial`, `image_path`) 
     VALUES ('$order_id','$check_date','$check_vagozari_serial','$check_serial','$target_file')");	
} 
//payment_status=1
mysqli_query($conn, "update `order_register` set  payment_state='1' where id='$order_id'");

//  header('location:../index.php?page=customer_payment');
?>