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
        $row = readProduct($product_id);
       
        ?>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                                
                    <td><a href="Update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>
                    
                </tr>
            
        </table>
    </body>
</html>
