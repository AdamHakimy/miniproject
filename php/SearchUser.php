<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GamingBank";
$search=$_POST["username"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email,birthday FROM UserInf WHERE username= '$search' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"] . " - Email: " . $row["email"]."-Password: " . $row["password"]."-Birthday: " . $row["birthday"]. "<br>";
     



     echo  '<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Profile - Gaming Bank</title>
    <link rel="stylesheet" href="./css/GameProfile.css">
</head>
<body>

    <header>
        
        <img src="https://cdn-icons-png.flaticon.com/512/4704/4704504.png" width="60" height="60">
        <h1><font color="#89CFF0">Gaming Bank </font></h1>
        <p>Your Ultimate Destination for Gaming</p>
        <div class="search-container">
            <form action="SearchUser.php" method="post">
                <input type="text" placeholder="Search for user..." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>

    <nav>
        <a href="./GamingBank2.html">Home</a>
        <a href="./GameDeals.html">Deals</a>
        <a href="./GameCart.html">Cart</a>
        <a href="./GameProfile.html">Profile</a>
    </nav>

    <div>
        
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="$row["username"]">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="$email">

           
 
            <label for="Birthday">Birthday:</label> 
             <input type="text" value="$row["birthday"]">
                 

            
    </div>

    <footer>
        &copy; 2024 Gaming Bank. All rights reserved.
    </footer>

</body>
</html>';}
    
} else {
    echo "0 results";
}
$conn->close();
?>