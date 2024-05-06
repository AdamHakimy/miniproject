<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idToChange = $_POST["idToChange"];
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newBirthdate = $_POST["newBirthdate"];

    // Validate and sanitize input data (You may add more validation as needed)
    // For simplicity, I'm just trimming whitespace here
    $idToChange = trim($idToChange);
    $newUsername = trim($newUsername);
    $newEmail = trim($newEmail);
    $newBirthdate = trim($newBirthdate);

    // Perform necessary actions (e.g., update database)
    // Replace this section with your actual logic

    // For demonstration, let's just echo back the updated information
    echo "<h2>Updated Information:</h2>";
    echo "<p>ID to change: $idToChange</p>";
    echo "<p>New username: $newUsername</p>";
    echo "<p>New email: $newEmail</p>";
    echo "<p>New birthdate: $newBirthdate</p>";
} else {
    // If the form is not submitted, redirect back to the form page or handle it accordingly
    header("Location: admin.html");
    exit; // Ensure no further execution
}
?>
