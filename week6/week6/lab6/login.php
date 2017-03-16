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
        include './functions/dbconnect.php';
        include'./functions/user_functions.php';
        $inputted_password = '';
        $inputted_email = '';
        if (isPostRequest()) {
            $inputted_password = sha1(filter_input(INPUT_POST, 'inputted_password'));
            $inputted_email = filter_input(INPUT_POST, 'inputted_email');
            if(login($inputted_email, $inputted_password) > 0) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = login($inputted_email, $inputted_password);
                var_dump($_SESSION);
                header('Location: admin.php');
            }
            else {
                echo "Error, invalid username/password combination";
            }
            
        } ?>
        <h1>Login</h1>
        <form action='#' method='post'>

            Email:<input type="text" name="inputted_email" placeholder="Email" />
            <br />
            Password:<input type="password" name="inputted_password" placeholder="Password" />
            <br />

            <input type="submit" value="Submit" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
