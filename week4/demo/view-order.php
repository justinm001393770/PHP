<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
                      
           $db = dbconnect();
           $column = 'incorp_dt';
           $order = 'ASC'; //DESC
           $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");

             $results = array();
             if ($stmt->execute() && $stmt->rowCount() > 0) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
          
        ?>
        
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Incorp Date Time</th>
                    <th>Email</th>
                    <th>Zipcode</th>
                    <th>Owner</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
       
    </body>
</html>
