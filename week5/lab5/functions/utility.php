<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}


/*A method to curl/get a url and return the HTML contents.



*/
function getPageContent($url){
            
            $curl = curl_init(); 

        // set url 
        curl_setopt($curl, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($curl); 
        
        // close curl resource to free up system resources 
        curl_close($curl);    
            
            return $output;
        }
        
     /*
      *A method to collect all the thinks from an HTML string 
      * @return Array
      */   
function getLinkMatches($html) {
    $linkRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
    
    preg_match_all($linkRegex, $html, $linkMatches);
    $removeDuplicateLinks = array_unique($linkMatches[0]);
    
    return $removeDuplicateLinks;
}

function dbInsertSites($site, $siteLinks)
{
                   
                $db = dbconnect();
                $stmt = $db->prepare('INSERT INTO sites SET date = now(), site = :site');
                $binds = array(":site" => $site);
                
                if($stmt->execute($binds) && $stmt->rowCount() > 0)
                {
                    $site_id = $db->lastInsertId();
                    
                    $stmt = $db->prepare('INSERT INTO sitelinks SET site_id = :site_id, link = :link');
                    
                    foreach ($siteLinks as $link)
                    {
                        $binds = array("site_id" => $site_id, ":link"=>$link);
                        $stmt->execute($binds);
                    }
                    return true;
                    
                }
                else
                {
                    return false;
                }
}
function checkUnique($site) {
                $db = dbconnect();
                $stmt = $db->prepare('SELECT * FROM sites WHERE site = :site');
                $binds = array(":site" => $site);
                if($stmt->execute($binds) && $stmt->rowCount() === 0) {
                    return true;
                }
                else {
                    return false;
                }
}