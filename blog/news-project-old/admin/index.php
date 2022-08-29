<?php
require('config/conn.php');
require_once('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/adminstyle.css">
</head>

<body>
    <div class="main">

        <?php
        $validPages = [
            'add-cat',
            'add-content',
            'admin-cat',
            'admin-content',
            'delete-cat',
            'delete-content',
            'edit-cat',
            'edit-content',
            'update-cat',
            'update-content',
            'home'

        ];

        if (!empty($_GET['page'])) {
            $page = strtolower(trim($_GET['page']));
            if (!in_array($page, $validPages) || !file_exists('pages/' . $page . ".php")) {
                $page = '404';
            }
        } else {

            $page = 'home';
        }
        require_once('pages/' . $page . '.php');
        ?>

    </div>
    <?php require_once('footer.php');  ?>
</body>

</html>