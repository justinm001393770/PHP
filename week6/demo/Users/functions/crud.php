<?php
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function readAllProducts() {
$db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}

function readAllCategories() {
$db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM categories");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}
function deleteProducts($id) {
    $db = dbconnect();
            
            $id = filter_input(INPUT_GET, 'product_id'); 
            
            $stmt = $db->prepare("DELETE FROM products where product_id = :product_id");
            
            $binds = array(
                ":product_id" => $id
            );

       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        return $isDeleted;
        
        
}