<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart Checkout</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include '../functions/authorized.php';
            include'./templates/header.php';
            include './functions/cart_functions.php';
            if(!isset($_SESSION)) {
                
            session_start();
            }
            
            /* php processing variables */
            $action = filter_input(INPUT_POST, 'action');                      
            
            if ( $action === 'Empty cart' ) {
                emptyCart();
            }
            
            /* View variables */
            startCart();
            $cart = getCart();
            $total = getCartTotal();
                                    
            include './templates/cart-items.html.php';
            include './templates/clear-cart.html.php';
        ?>
        
        <p><a href="index.php">Continue Shopping</a></p>
    </body>
</html>
