
<?php
if (empty($newsid)||empty($_FILES["fileToUpload"]["tmp_name"]))
{echo 'فیلد ها را پر کنید';};

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "فایل ". basename( $_FILES["fileToUpload"]["name"]). " بارگزاری شد
    .";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
include('../config/conn.php');
//insert into image table
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$newsid = $_POST['newsid'];

 //check if image is registered before
$query = mysqli_query($conn, "select * from `newscontent` where newsid='$newsid'");
$row = mysqli_fetch_array($query);

if (!empty($newsid)&& isset($row['newsid'])) {
	mysqli_query($conn, "insert into `newsimages` (id,newsid,imagepath) values ('','$newsid','$target_file')");
}

?>
 <a href="../index.php?page=admin-content">بازگشت</a>
