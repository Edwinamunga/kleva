<?php

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $company = $_POST['company'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // include db connect class
    require_once __DIR__ . '/core/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("UPDATE products SET name = '$name', price = '$price', category='$category', company='$company', description = '$description' WHERE pid = $pid");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
