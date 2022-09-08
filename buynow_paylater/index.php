
 <?php include_once("header.php"); ?>

<div class="main">
        <?php

         $validPages = [
                'home',
                'categories',
                'order_register',
                'details',
                'aboutus',
                'contact',
                'installment_agreement',
                'customer_pannel',
                'customer_payment'
            ];    
            
            if(!empty($_GET['page'])) {
                $page = strtolower(trim($_GET['page']));
                if(!in_array($page,$validPages) || !file_exists('pages/'.$page.".php")) {
                    $page = '404';
                }
                
            } else {
                $page = 'home';
            }
            require_once ('pages/'.$page.'.php');
      
        ?>
</div>

<?php include_once("footer.php"); ?>

</body>

</html>