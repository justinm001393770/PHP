<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        
        <h1>Admin Page</h1>
        <?php
        include './functions/dbconnect.php';
        include './functions/authorized.php';
        include './cart/templates/header.php';
        include'./functions/user_functions.php';
        if(!isset($_SESSION)) {
        session_start();
        }
        ?>
        <a href="CRUDCategories.php">Manage Categories</a><br>
        <a href="CRUDProducts.php">Manage Products</a><br>
    </body>
</html>
