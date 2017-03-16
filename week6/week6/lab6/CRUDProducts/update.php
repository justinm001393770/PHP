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
        <h1>Update</h1>
        <?php
        include '../functions/dbconnect.php';
        include '../functions/authorized.php';
        include '../functions/user_functions.php';
        
        $product_id = filter_input(INPUT_GET, 'product_id');
        $category_id = filter_input(INPUT_GET, 'category_id');
        $product = filter_input(INPUT_GET, 'product');
        $price = filter_input(INPUT_GET, 'price');
        if(isPostRequest()) {
            $result = updateProduct($product_id, $category_id, $product, $price);
            if($result==true) {
                echo "Successfully updated product";
            }
            else
            {
                echo "Error, did not update product";
            }
        }
        
        
        
        if (empty($product_id))
        {
            exit("Error, no id found");
        }
        $results = readProduct($product_id);
        $product_id = $results["product_id"];
        $category_id = $results["category_id"];
        $product = $results["product"];
        $price = $results["price"];
        
                ?>
        <!--<h1><?php echo $result; ?></h1>-->
        
        <form method="post" action="#">   
            Category ID: <input type="text" value="<?php echo $category_id; ?>" name="category_id" />
            <br />
            Product Name: <input type="text" value="<?php echo $product; ?>" name="product" />
            <br />
            Price: <input type="text" value="<?php echo $price; ?>" name="price" />
            <br />
            <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="../CRUDProducts.php">View page</a></p>
    </body>
</html>
