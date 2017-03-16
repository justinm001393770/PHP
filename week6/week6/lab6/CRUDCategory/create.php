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
        
            $category = filter_input(INPUT_POST, 'category');
if (isPostRequest()) {


            $results = createCategory($category);
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
        
        <p> <a href="../CRUDCategories.php">View page</a></p>
        
        
                    <form method="post" action="#">            
            
            Category <input type="text" value="<?php echo $category; ?>" name="category" />
            <br />
            <input type="submit" value="Add" />
        </form>
    </body>
</html>
