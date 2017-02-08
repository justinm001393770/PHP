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
        
        include './functions/dbconnect.php';
        include './functions/utility.php';
        
        $site = filter_input(INPUT_POST, 'site');
        $errors = array();
        
        if (isPostRequest() ) {
        if ( filter_var($site, FILTER_VALIDATE_URL) === false  ){
            $errors[] = 'Site URL not valid';
        }
        
        if(count($errors)=== 0)
        {
            $html = getPageContent($site);
            
            if(!empty($html)) 
            {
                $siteLinks = getLinkMatches($html);
                $funcOutput = dbInsertSites($site, $siteLinks);
                if ($funcOutput === true){
                    ?><h2>Site successfully added: <?php echo $site ?></h2>
                      <?php
                }
                else{
                    ?><h2>Error, sites not added</h2><?php
                }

                
            }
            //var_dump($output);
        }
        }
        ?>
        
        <?php include './templates/error-messages.php'; ?>
        <form action='#' method='post'>
            
            Site:<input type="text" name="site" value="<?php echo $site;?>" />
            <br />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
