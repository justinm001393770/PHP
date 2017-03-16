<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        
        <?php
            include '../functions/authorized.php';
            include './templates/header.php';
            include '../functions/dbconnect.php';
            include './functions/cart_functions.php';
            if(!isset($_SESSION)) {
            session_start();
            }
                        
            /* php processing variables */
            $action = filter_input(INPUT_POST, 'action');
            $cartID = filter_input(INPUT_POST, 'id');
            $catID = filter_input(INPUT_GET, 'cat');
            
            if ( $action === 'Buy' ) {
                addToCart($cartID);
            }
            
            if ( $action === 'Empty cart' ) {
                emptyCart();
            }               
            
            
            /* View variables */
            startCart();
            $items = getItems();            
            $cartCount = cartCount();
            $allCategories = getCategories();
            
            
            if ( !is_null($catID) ) {
                $items = getItemsByCategory($catID);
            }
            
            include './templates/categories.html.php';
            include './templates/cart-count.html.php';
            include './templates/clear-cart.html.php';
            include './templates/catalog.html.php';
        ?>
        
        <p><a href="checkout.php">CheckOut</a></p>
    </body>
</html>