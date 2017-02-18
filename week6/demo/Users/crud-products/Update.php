<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include '../functions/dbconnect.php';
            include '../functions/crud.php';
            
            
        
        
        $result = '';
                ?>
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Product ID: <input type="text" value="<?php echo $product_id; ?>" name="product_id" />
            <br />
            Category ID: <input type="text" value="<?php echo $category_id; ?>" name="category_id" />
            <br />  
            Product Name: <input type="text" value="<?php echo $product; ?>" name="product" />
            <br />
            <input type="hidden" value="<?php echo $id; ?>" name="product_id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
