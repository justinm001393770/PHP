<?php

function getItems() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function getCategories() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM categories");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function getItemsByCategory($id) {
    $items = getItems();
    $cart = [];
    foreach ($items as $product) {
      if ( $product['category_id'] == $id ) {
        $cart[] = $product;        
      }
    }    
    return $cart;
}

function emptyCart() {
    unset($_SESSION['cart']);
}

function startCart() {
    if ( !isset($_SESSION['cart']) ) {
      $_SESSION['cart'] = array();
    }
}

function getCart() {    
    return $_SESSION['cart']; 
}

function cartCount() {
    return count(getCart());
}

function addToCart($id) {
    $items = getItems();

    foreach ($items as $product) {
      if ( $product['product_id'] == $id ) {
        $_SESSION['cart'][] = $product;
        break;
      }
    }    
      
}

function getCartTotal(){
    $items = getCart();
    $total = 0;
    foreach ($items as $product) {      
        $total += $product['price'];
    }   
    return $total;
}