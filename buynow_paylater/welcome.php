<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url('background_photo/shop.jpg');
        }
        .link{
            float: left;
            margin: 10px;
        }
    </style>
</head>

<body>
    <a href="logout.php" class="link"> logout</a>
    <h1 class="my-5"> .به سایت آتی پرداخت خوش آمدی, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>سلام</h1>
    <p>
        <a href="seller/index.php" class="btn btn-warning"> ارایه دهنده خدمات</a>
        <a href="index.php" class="btn btn-danger ml-3"> خریدار</a>
    </p>
</body>

</html>