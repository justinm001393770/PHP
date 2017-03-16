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
        $category_id = filter_input(INPUT_GET, 'category_id');
        $row = readCategory($category_id);
       
        ?>

        <table>
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
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
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                                
                    <td><a href="Update.php?category_id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></td>            
                </tr>
            
        </table>
    </body>
</html>
