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

// Insert data from register page
if(isset($_POST['Uname']) && isset($_POST['email']) && isset($_POST['passID']) && isset($_POST['Day']) && isset($_POST['Month']) && isset($_POST['Year'])) {
    $username = $_POST['Uname'];
    $email = $_POST['email'];
    $password = $_POST['passID'];
	 $day = $_POST['Day'];
    $month = $_POST['Month'];
    $year = $_POST['Year'];
	
	 $birthday = "$day $month $year";

    $sql = "INSERT INTO USERinf (username, email, password,birthday)
    VALUES ('$username', '$email', '$password','$birthday')";

    if ($conn->query($sql) === TRUE) {
       header("Location: ../PBLLogin1.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
