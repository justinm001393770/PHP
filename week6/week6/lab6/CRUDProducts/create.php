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
        include '../functions/dbconnect.php';
        include '../functions/authorized.php';
        include '../functions/user_functions.php';
        
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            
if (isPostRequest()) {


            $results = createProduct($category_id, $product, $price);
            if($results === true) {
                echo "Category successfully added.";
            }
            else {
                echo "Error, category not added. Please try again";
            }
            /*
             * empty()
             * isset()
             */

}
        ?>
        
        <p> <a href="../CRUDProducts.php">View page</a></p>
        
        
                    <form method="post" action="#">            
            
            Category ID<input type="text" value="<?php echo $category_id; ?>" name="category_id" />
            <br />
            Product<input type="text" value="<?php echo $product; ?>" name="product" />
            <br />
            Price<input type="text" value="<?php echo $price; ?>" name="price" />
            <br />
            <input type="submit" value="Add" />
        </form>
    </body>
</html>
