<?php
function signup($email, $password) {        
        $db=dbconnect();
        
        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");
        
        $password = sha1($password);
        
        $binds = array(
            ":email" => $email,
            ":password" => $password
        );
        
        $results = false;
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = true;
            
        }
        return $results;
}

//For userExists, if returns true, it means a user does exist. If false, no user exists
function userExist($email) {
    $db=dbconnect();
        
        $stmt = $db->prepare("SELECT email FROM users WHERE email = :email");
       
        $binds = array(
            ":email" => $email
        );
        
        $results = false;
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = true;
            
        }
        return $results;
    
}

//If returns true, it means that the login credentials are correct
function login($email, $password) {
    $db=dbconnect();
        
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        
        $password = sha1($password);
        
        $binds = array(
            ":email" => $email,
            ":password" => $password
        );
        
        $results = 0;
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $results = $data['user_id'];
            
        }
        return $results;
}
        ?>
