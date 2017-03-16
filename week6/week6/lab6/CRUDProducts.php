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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include './functions/dbconnect.php';
        include './functions/authorized.php';
        include './cart/templates/header.php';
        include './functions/user_functions.php';
        $results = readAllProducts();
        ?>

        <table class="table table-striped">
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

<?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>

                    <td><a href="./CRUDProducts/Read.php?product_id=<?php echo $row['product_id']; ?>">Read</a></td>
                    <td><a href="./CRUDProducts/Update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a href="./CRUDProducts/Delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>            
                </tr>

<?php endforeach; ?>
            <a href="./CRUDProducts/create.php?product_id=<?php echo $row['product_id']; ?>">Add Product</a>
        </table>
    </body>
</html>
