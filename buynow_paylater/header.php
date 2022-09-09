<!DOCTYPE html>
<?php session_start();   ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body style="margin-top: 0;padding:0;">
    <header style="margin-top: 0;padding:0;">
        <div class="top-container">

            <p>
            <h1> سیستم خرید اقساطی خدمات </h1>
            </p>

            <div class="navbar">
                <ul class="menu">
                    <li>
                        <a href=index.php><i class="fa fa-home" style="font-size:36px"></i></a>
                    </li>
                    <li>
                       <a href="index.php?page=categories&catid=1"> <i class="fa fa-caret-down"></i> دسته ها</a>
                            <ul class="submenu">

                                <li>
                                    <a href="index.php?page=categories&category_id=7"> دندان پزشکی </a>
                                </li>
                                <li>
                                    <a href="index.php?page=categories&category_id=13>"> حمل و نقل </a>
                                </li>
                                <li>
                                    <a href="index.php?page=categories&category_id=9>"> لوله کشی </a>
                                </li>
                                <li>
                                    <a href="index.php?page=categories&category_id=10>"> آموزش </a>
                                </li>
                                <li>
                                    <a href="index.php?page=categories&category_id=13"> باغبانی </a>
                                </li>
                                <li>
                                    <a href="index.php?page=categories&category_id=16>"> نظافت </a>
                                </li>
                            </ul>
                    </li>

                    <!-- <li class="navbar-left"><a href="#"><i class="fa fa-user"></i> ورود</a></li> -->
                    <li class="navbar-right">
                        <input type="text" class="search-input" placeholder="جستجو...">
                        <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                    </li>
                    <li>
                        <a href="index.php?page=installment_agreement"> توافق نامه خرید اقساطی</a>
                    </li>
                    <li  class="navbar-left">
                       <a href="../buynow_paylater/logout.php"> خروج</a>
                    </li>
                    <li class="navbar-left">
                        <a href="index.php?page=customer_pannel">پنل کاربری<?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                    </li>
                    
                </ul>


            </div>
        </div>
    </header>