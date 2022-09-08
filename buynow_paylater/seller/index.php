<?php
// require('config/conn.php');
require_once('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sellerstyle.css">
</head>

<body>
    <div class="main">

        <?php
        $validPages = [
            'service_add',
            'service_list',
            'service_del',
            'service_edit',
            'service_update',
            'seller_pannel',
            'seller_pannel_confirm',
            'seller_pannel_refuse',
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