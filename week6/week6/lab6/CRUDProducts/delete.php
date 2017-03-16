<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../functions/dbconnect.php';
        include '../functions/authorized.php';
        include '../functions/user_functions.php';

        $product_id = filter_input(INPUT_GET, 'product_id');
        $isDeleted = deleteProduct($product_id);
        if($isDeleted == true) {
            echo "<h2>Record successfully deleted</h2>";
        }
        else {
            echo "<h2>Error, record not deleted</h2>";
        }
        ?>
       

        <p> <a href="../CRUDProducts.php">View page</a></p>
    </body>
</html>
