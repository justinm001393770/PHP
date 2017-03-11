<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include './functions/until.php';    
        $fullname = filter_input(INPUT_POST, 'fullname');
        $dob = filter_input(INPUT_POST, 'dob');
        
        $errors = array();
        //The isPostRequest funtion tests to make sure that you already pressed submit before displaying error message. Requires the include functino above
        if (isPostRequest()) {
            
        
        if ( empty($fullname) ) {
            $errors[] = 'Fullname is not valid';
        }
        
        if ( empty($dob) ) {
            $errors[] = 'Date of birth is not valid';
        }
        
        if ( count($errors) === 0) {
            //save data
        }
        }
        
        ?>
       
        <?php include './templates/error-messages.php'; ?>
        
        <form method="post" action="#">
            
            name : <input type="text" name="fullname" value="<?php echo $fullname; ?>" />
            <br />
            DOB : <input type="date" name="dob" value="<?php echo $dob; ?>" />
            <br />
            
            <input type="submit" value="submit" />
        </form>
        
    </body>
</html>
