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
        // put your code here
        include './functions/dbconnect.php';
        include './functions/until.php';
        include './functions/users.php';
        
        if( isPostRequest() ) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            
            $userExist = userExist($email);
            $errors = [];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false && $password != '' && $email != '') {

            
            if ( $userExist === true ) {
                $errors[] = 'Email already exists.';
                
            }
            
            if ( count($errors) === 0 ) {
                $result = signup($email, $password);
                
                if($result === true ) {
                    header('Location: login.php');
                    
                } else{
                    echo "There was an error entering credentials into database. Please try again";
                }
                
            }
            } else {
            echo("Credentials incorrect. Please check email and password are valid");
        }
            //todo: validation
            
            $result = signup($email, $password);
            
            if($result === true) {
                header('Location: login.php');
            }
            else
            {
                //todo: Show error message
            }
        }
        

        
        
        ?>
        <h1>Sign Up</h1>
        <?php include './functions/error-messages.html.php'; ?>
        
        <?php include './templates/users-form.html.php'; ?>
    </body>
</html>
