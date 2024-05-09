<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GamingBank";
$delete = $_POST["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM UserInf WHERE id= '$delete' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetching data from the database
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $username = $row["username"];
        $email1 = $row["email"];
        $birthday = $row["birthday"];
    } 
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<nav>
    <div class="header">
        <h1>ADMIN VIEW</h1>

        <div>    
        <img src="../img/gamingbanklogo.png" width="60" height="60">
        <h3> Gaming Bank</h3>
    </div>
    </div>
</nav>

<div class="main">



<div class="container">
        <form action="adminsearch.php" method="post">
        <h1>Search</h1>
        <div class="align">
            <input type="text" placeholder="Search" name="username">
            <button>GO!</button>
        </div>

        </form>
        <div class="align">
        <input type="text" name="id" placeholder="Username">
        <input type="text" name="Uname" placeholder="Username">
            <input type="email" name="email"  placeholder="Email">
            <input type="text" name="Day" class="mini" placeholder="Day">
        </div>

    </div>



    <form action="admindelete.php" method="post" class="container">
        <h1>Delete</h1>
        <div class="align">
        <input type="text" placeholder="Enter ID" name="id">
            <button>GO!</button>
        </div>


        <div class="align">
        <input type="text" placeholder="" name="username">
        </div>
    </form>

    <form action="adminupdate.php" method="post" class="container">
        <h1>Update</h1>
        <div class="align">


        <input type="text" placeholder="Enter ID to change" name="id">
            <br>

            <input type="text" placeholder="New username" name="username">
            <input type="email" name="New email" placeholder="Email">
            <input type="text" name="New birthdate" class="mini" placeholder="Day">
            <button>GO!</button>
        </div>

    </form>



</div>

    
</body>
</html>


