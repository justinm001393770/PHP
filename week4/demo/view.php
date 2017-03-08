<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
           
           $results = getAllCorpsData();
            

           $column = filter_input(INPUT_POST, 'column');
           $action = filter_input(INPUT_POST, 'action');
           $corp = filter_input(INPUT_POST, 'corp');
           $order = filter_input(INPUT_POST, 'order');
           $search = filter_input(INPUT_POST, 'search');
           
            if ($action === 'submit1') {
              
               $results = orderCorps($column, $order);
            }
            if ($action === 'submit2') {
                $results = searchCorps($column, $search);

            } 
        ?>
        <p>Showing <?php echo count($results); ?>results:</p>
        <?php include './includes/form1.php'; ?>
        <?php include './includes/form2.php'; ?>
        <?php include './includes/showTestResults.php'; 
        

            ?>
        
           
    </body>
</html>
