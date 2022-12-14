<!DOCTYPE html>
<html>
<?php session_start();   ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/sellerstyle.css">
</head>

<body>
    <header>
        <div class="top-container">

            <p>
            <h1> صفحه مدیریت فروشنده </h1>
            </p>

            <div class="navbar">
                <ul class="menu">
                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    <li>
                        <a href=index.php><i class="fa fa-home" style="font-size:36px"></i></a>
                    </li>
                    <li>
                       <a href="index.php?page=service_list"> مدیریت  خدمات فروشنده</a>
                    </li>
                    <li>
                       <a href="index.php?page=seller_pannel">پنل سفارشات</a>
                    </li> 
                    <li>
                       <a href="index.php?page=seller_pannel_confirm">سفارشات تایید شده  </a>
                    </li> 
                    <li>
                       <a href="index.php?page=seller_pannel_paid">  گزارش مطالبات </a>
                    </li> 
                    <li>
                       <a href="index.php?page=seller_pannel_refuse"> سفارشات رد شده</a>
                    </li>
                    <li  class="navbar-left">
                       <a href="../logout.php"> خروج</a>
                    </li>                    
                </ul>

            </div>
        </div>
    </header>