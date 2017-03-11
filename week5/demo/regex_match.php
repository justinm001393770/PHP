<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * http://php.net/manual/en/function.preg-match-all.php
         * http://php.net/manual/en/function.array-unique.php
         * 
         */
               
            $emailOnlyRegex = '/^[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}$/';
            $emailRegex = '/[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}/';
            
            //Change this from hardcoded to something from the curl function
            $text = 'Hello <strong>My</strong> email is <a href="mailto:test@test.com">test@test.com</a>, <em>please contact me</em>.';
            //The final variable is created in the function, no need to declare it. First variable is the regular expression, the second is the text that you want to search.
            preg_match_all($emailRegex, $text, $emailMatches);
            
            print_r($emailMatches[0]);
            echo '<hr />';
            $removeDuplicates = array_unique($emailMatches[0]);
            print_r($removeDuplicates);
        
        ?>
    </body>
</html>
