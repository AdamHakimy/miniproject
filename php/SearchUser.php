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
             <link rel="stylesheet" type="text/css" href="../css/GameProfile.css">
             <title>Profile - Gaming Bank</title>
         </head>
     
         
         <body class="special">
             <header>
                 <img src= "https://cdn-icons-png.flaticon.com/512/4704/4704504.png" width="60" height="60">
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
                 <a href="GamingBank2.html">Home</a>
                 <a href="GameDeals.html">Deals</a>
                 <a href="GameCart.html">Cart</a>
                 <a href="GameProfile.html">Profile</a>
             </nav>
             <br>
             <br>
             <div class="container" align="center">
                 <form action="register.php" method="post" align="left">
                     <center>
                         <input type="text" nane="Uname" placeholder="Username">
                         <input type="email" name="email" placeholder="Email">
                         <input type="password" name="passID" placeholder="Password">
                         <br>
                         <br>
                         <font color="grey" size="-1">Date of birth: </font>
                         <br>
                         <input name="Day" type="text" class="mini" placeholder="Day">
                         <select name="Month" class="mini grey">
                             <option>January</option>
                             <option>February</option>
                             <option>March</option>
                             <option>April</option>
                             <option>May</option>
                             <option>June</option>
                             <option>July</option>
                             <option>August</option>
                             <option>September</option>
                             <option>October</option>
                             <option>November</option>
                             <option>December</option>
                         </select>
                         <input name="Year" type="text" class="mini" placeholder="Year">
                         <br>
                         <br>
                         <input type="radio" id="male" name="gender">
                         <label for="male">Male</label>
                         <input type="radio" id="female" name="gender">
                         <label for="female">Female</label>
                         <br>
                         <br>
                         <input type="submit" value="Save Changes">
                     </center>
                 </form>
             </div>
             <footer> &copy; 2024 Gaming Bank. All rights reserved. </footer>
         </body>
     </html> ';}
    
} else {
    echo "0 results";
}
$conn->close();
?>