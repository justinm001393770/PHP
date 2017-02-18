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

            /*
             * get and hold a database connection 
             * into the $db variable
             */
            $db = dbconnect();
            
            $id = filter_input(INPUT_GET, 'product_id');
            var_dump($id);
            $isDeleted = deleteProducts($id);    
        
        ?>
        
        
        <h1> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
        <?php endif; ?>
        Deleted</h1>
        
        <p> <a href="crud-products.php">View page</a></p>
        
        
        
    </body>
</html>
