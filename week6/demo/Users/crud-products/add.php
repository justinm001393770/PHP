<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
      <?php  
            include './dbconnect.php';
            include './functions.php';
            include './corpsCRUD.php';
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
if (isPostRequest()) {


            $results = createCorps($corp, $email, $zipcode, $owner, $phone);
            echo $results;
            /*
             * empty()
             * isset()
             */

}
        ?>
        
        <p> <a href="view-action.php">View page</a></p>
        
        
                    <form method="post" action="#">            
            
            Corporation Name <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />  
            Email <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br /> 
            <input type="submit" value="Add" />
        </form>
    </body>
</html>
