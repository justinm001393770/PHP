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
        
        $category_id = filter_input(INPUT_GET, 'category_id');
        if(isPostRequest()) {
            $result = updateCategory($category_id);
            if($result==true) {
                echo "Successfully updated category";
            }
            else
            {
                echo "Error, did not update category";
            }
        }
        
        
        
        if (empty($category_id))
        {
            exit("Error, no id found");
        }
        $results = readCategory($category_id);
        $category = $results["category"];
        
                ?>
        <!--<h1><?php echo $result; ?></h1>-->
        
        <form method="post" action="#">            
            Category name: <input type="text" value="<?php echo $category; ?>" name="category" />
            <br />
            <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="../CRUDCategories.php">View page</a></p>
    </body>
</html>
