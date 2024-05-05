<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GamingBank";
$search = $_POST["username"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email, birthday FROM UserInf WHERE username= '$search' ";
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
    <link rel="stylesheet" type="text/css" href="../css/GameProfile.css">
    <title>Profile - Gaming Bank</title>
</head>

<body class="special">
<header>
    <img src="../img/gamingbanklogo.png" width="60" height="60">
    <h1>
        <font color="#89CFF0">Gaming Bank </font>
    </h1>
    <p>Your Ultimate Destination for Gaming</p>
    <div class="search-container">
        <form action="./php/SearchUser.php" method="post">
            <input type="text" placeholder="Search for user..." name="username">
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
<br><br>
<div class="container" align="center">
    <form action="register.php" method="post" align="left">
        <center>
            <input type="text" name="Uname" value="<?php echo $username; ?>" placeholder="Username">
            <input type="email" name="email" value="<?php echo $email1; ?>" placeholder="Email">

            <br><br>
            <font color="grey" size="-1">Date of birth: </font>
            <br>
            <input type="text" name="Day" value="<?php echo $birthday; ?>" class="mini" placeholder="Day">
            <br><br>
            <input type="submit" value="Save Changes">
        </center>
    </form>
</div>
<footer>&copy; 2024 Gaming Bank. All rights reserved.</footer>
</body>
</html>
