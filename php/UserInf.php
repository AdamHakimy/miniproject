<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GamingBank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create table
$sql_create_table = "CREATE TABLE USERinf (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(30) NOT NULL,
birthday VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table has been created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
