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
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Signup</h1>
        <?php
        include './functions/dbconnect.php';
        include'./functions/user_functions.php';
        


        if (isPostRequest()) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            if (validation($email, $password) == true) {
                if (signup($email, $password) == true) {
                    echo "<br>Successfully added to database";
                } else {
                    echo "<br>Error adding credentials to database. Please try again";
                }
            }
        }
        ?>
        <form action='#' method='post' class="form-inline">

            Email:<input type="text" class="form-control" name="email" placeholder="Email" />
            <br />
            Password:<input type="password" class="form-control "name="password" placeholder="Password" />
            <br />

            <input type="submit" class="btn btn-default" value="Submit" />
        </form>
<?php
// put your code here
?>
    </body>
</html>
