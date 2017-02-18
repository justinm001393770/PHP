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
        <?php include './templates/access_required.php'; 
        include './functions/dbconnect.php';
        include './functions/crud.php';
        ?>
        <a href="crud-products/crud-products.php">Manage Products</a>
        <a href="crud-categories/crud-categories.php">Manage Categories</a>
        
    </body>
</html>
