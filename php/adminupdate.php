<?php
// Check if the form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idToChange = $_POST["id"];
    $newUsername = $_POST["username"];
    $newEmail = $_POST["email"];
    $newPassword = $_POST["password"];

    // Validate and sanitize input data (You may add more validation as needed)
    // For simplicity, I'm just trimming whitespace here
    $idToChange = trim($idToChange);
    $newUsername = trim($newUsername);
    $newEmail = trim($newEmail);
    $newPassword = trim($newPassword);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "GamingBank";

    /// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "UPDATE UserInf SET username='$newUsername', email='$newEmail', password='$newPassword' WHERE id='$idToChange'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        header("refresh:3;url=../admin.html"
    );
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page or handle it accordingly
    header("Location: admin.php");
    exit; // Ensure no further execution
}

?>
