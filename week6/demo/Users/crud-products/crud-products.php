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
        include '../templates/access_required.php';
        include '../functions/dbconnect.php';
        include '../functions/crud.php';

        $results = readAllProducts();
        ?>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product</th>
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

<?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>

                    <td><a href="Read.php?product_id=<?php echo $row['product_id']; ?>">Read</a></td>
                    <td><a href="Update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>            
                </tr>

<?php endforeach; ?>
<!-- <a href="add.php?id=<?php echo $row['id']; ?>">Add Corporation</a> -->
        </table>
    </body>
</html>
