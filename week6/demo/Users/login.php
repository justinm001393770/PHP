<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        include './functions/dbconnect.php';
        include './functions/users.php';
        include './functions/until.php';
        
        if (isPostRequest() ) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            
            $result = login($email, $password);
            
            if( $result != 0) {
                $_SESSION['user_id'] = $result;
                header('Location: admin.php');
                
            }
            else {
                echo "Error, incorrect login credentials";
            }
        }
        ?>
        <h1>Login</h1>
        <?php include './templates/users-form.html.php'; ?>
    </body>
</html>
