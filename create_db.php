<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create tables
$sql = "CREATE TABLE IF NOT EXISTS tbl_admin (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100),
        username VARCHAR(100),
        password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbl_category (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    image_name VARCHAR(255),
    featured VARCHAR(10),
    active VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS tbl_food (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image_name VARCHAR(255),
    category_id INT UNSIGNED,
    featured VARCHAR(10),
    active VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS tbl_order (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    food VARCHAR(150),
    price DECIMAL(10,2), 
    qty INT,
    total DECIMAL(10,2),
    order_date DATETIME,
    status VARCHAR(50),
    customer_name VARCHAR(150),
    customer_contact VARCHAR(20),
    customer_email VARCHAR(150),
    customer_address VARCHAR(255)
);";

// Execute the multi-query
if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            // Free result set
            $result->free();
        }
        // If there are more queries, prepare the next result
    } while ($conn->more_results() && $conn->next_result());
} else {
    die("Error executing multi_query: " . $conn->error);
}

// Close the connection
$conn->close();

?>
