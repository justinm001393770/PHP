<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        
            require './functions/dbconnect.php';
            require './functions/utility.php';
            include './header.php';
            
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $site_id = '';
                
                if ( isPostRequest() ) {
                    
                    
                    $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $error = 'No Results found';
                    }
                    
                    
                    
                }
                
        ?>
        
        <?php if( isset($error) ): ?>        
            <h1><?php echo $error;?></h1>
        <?php endif; ?>
            <br />
            
        <form method="post" action="#">
 
            <select name="site_id">
            <?php foreach ($sites as $row): ?>
                <option 
                    value="<?php echo $row['site_id']; ?>"
                    <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                >
                    <?php echo $row['site']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
        </form>
        
        
        
        
        <?php if( isset($results) ): ?>
 
            <h2>Results found <?php echo count($results); ?></h2>
            <table class="table table-striped">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><a href="<?php echo $row['link']; ?>" target="popup"><?php echo $row['link']; ?></a> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
            
            

        
        
        
    </body>
</html>
