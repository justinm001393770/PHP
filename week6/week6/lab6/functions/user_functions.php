<?php

//include './functions/dbconnect.php';

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function is_unique_email($email) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");

    $binds = array(
        ":email" => $email
    );

    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() == 0) {
        $results = true;
    }
    return $results;
}

function validation($email, $password) {
    $errors = array();
    if (is_unique_email($email) === false) {
        $errors[] = 'Email is already associated with an account.';
    }
    if ($email == '') {
        $errors[] = 'Email field is empty.';
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Email is invalid.';
    }
    if ($password == '') {
        $errors[] = 'Password field is empty.';
    }
    if (count($errors) == 0) {
        return true;
    } else {
        echo 'Error submitting form to database. Please adjust the following: <br>';
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        return false;
    }
}

function signup($email, $password) {
    $db = dbconnect();

    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");

    $sha1_password = sha1($password);

    $binds = array(
        ":email" => $email,
        ":password" => $sha1_password
    );

    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

function login($inputted_email, $inputted_password) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT user_id FROM users WHERE email = :email AND password = :password");

    $binds = array(
        ":email" => $inputted_email,
        ":password" => $inputted_password
    );

    $user_id = 0;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
        //Extreme spaghetti code to make the value it returns an int instead of an array
        foreach ($user_id as $id) {
            $results = $id;
        }
    }
    return $results;
}

function get_id($email) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT user_id WHERE email = :email");

    $binds = array(
        ":email" => $email,
    );

    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

/* CRUD functions below\

  //-----Categories-----// */

function createCategory($category) {
    $db = dbconnect();
    $result = false;

    $stmt = $db->prepare("INSERT INTO categories SET category = :category");
    $binds = array(
        ":category" => $category
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = true;
    }
    return $result;
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

function readCategory($category_id) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
    $binds = array(":category_id" => $category_id);
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function deleteCategory($category_id) {
    $db = dbconnect();

    $stmt = $db->prepare("DELETE FROM categories where category_id = :category_id");

    $binds = array(
        ":category_id" => $category_id
    );


    $isDeleted = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $isDeleted = true;
    }
    return $isDeleted;
}

function updateCategory($category_id) {
    $db = dbconnect();

    //$result = false;
    if (isPostRequest()) {
        $category_id = filter_input(INPUT_POST, 'category_id');
        $category = filter_input(INPUT_POST, 'category');

        $stmt = $db->prepare("UPDATE categories set category = :category where category_id = :category_id");

        $binds = array(
            ":category_id" => $category_id,
            ":category" => $category
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    } else {
        $category_id = filter_input(INPUT_GET, 'category_id');
        $stmt = $db->prepare("SELECT * FROM categories where category_id = :category_id");
        $binds = array(
            ":category_id" => $category_id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        if (!isset($category_id)) {
            die('Record not found');
        }
        $category_id = $results['category_id'];
        $category = $results['category'];
    }
}

//-----Products-----//

function createProduct($category_id, $product, $price) {
    $db = dbconnect();
    $result = false;

    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price");
    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price
        
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = true;
    }
    return $result;
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
function updateProduct($product_id) {
    $db = dbconnect();

    $result = false;
    if (isPostRequest()) {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $category_id = filter_input(INPUT_POST, 'category_id');
       $product = filter_input(INPUT_POST, 'product');
        $price = filter_input(INPUT_POST, 'price');

        $stmt = $db->prepare("UPDATE products SET category_id = :category_id, product = :product, price = :price WHERE product_id = :product_id");

        $binds = array(
            ":product_id" => $product_id,
            ":category_id" => $category_id,
            ":product" => $product,
            ":price" => $price
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    } else {
        $product_id = filter_input(INPUT_GET, 'product_id');
        $stmt = $db->prepare("SELECT * FROM products where product_id = :product_id");
        $binds = array(
            ":product_id" => $product_id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        if (!isset($product_id)) {
            die('Record not found');
        }
        $product_id = $results['product_id'];
        $category_id = $results['category_id'];
        $product = $results['product'];
        $price = $results['price'];
    }
}

function readProduct($product_id) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");
    $binds = array(":product_id" => $product_id);
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function deleteProduct($product_id) {
    $db = dbconnect();

    $stmt = $db->prepare("DELETE FROM products where product_id = :product_id");

    $binds = array(
        ":product_id" => $product_id
    );


    $isDeleted = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $isDeleted = true;
    }
    return $isDeleted;
}