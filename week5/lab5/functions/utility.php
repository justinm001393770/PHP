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