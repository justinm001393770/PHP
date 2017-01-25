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
            
            
        
        
        $result = '';
                ?>
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Corporation name: <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Date Time: <input type="text" value="<?php echo $incorp_dt; ?>" name="incorp_dt" />
            <br />  
            Email: <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip code: <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner: <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone: <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
