<?php
function createCorps($corp, $email, $zipcode, $owner, $phone) {
$db = getDatabase();
            $result = false;
            
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
                
            );
if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = true;
                   
                }
                return $result;
}

function readAllCorps() {
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM corps");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}

function readCorps($id) {
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $binds = array (":id" => $id);
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return $results;
}
function deleteCorps($id) {
    $db = getDatabase();
            
            $id = filter_input(INPUT_GET, 'id'); 
            
            $stmt = $db->prepare("DELETE FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );

       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        return $isDeleted;
        
        
}
function updateCorps($id) {
    $db = getDatabase();
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                
                $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":incorp_dt" => $incorp_dt,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $id = $results['id'];
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results['owner'];
                $phone = $results['phone'];
            }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

