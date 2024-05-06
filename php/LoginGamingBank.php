<?php
session_start(); // Start session to persist user login status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve user input from login form
    $email = $_POST['email'];
    $password = $_POST['passID'];

    // Prepare SQL statement to check if the user exists
    $sql = "SELECT * FROM USERinf WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, set session variables and redirect to GamingBank2.html
        $_SESSION['email'] = $email;
        header("Location: ../GamingBank2.html");
        exit();
    } else {
        // Invalid credentials, display error message
         echo '
         <!DOCTYPE html>
         <html>
           <head>
             <title>Login</title>
             <link rel="stylesheet" href="../css/PBLLogin1.css">
           </head>
           <body>
             <center>
               <div class="container">
                 <br> <img src="../img/gamingbanklogo.png" width="60" height="60">
                 <h1>Login to GamingBank</h1>
                 <h3>Use your Google Account</h3>
                 <form id="loginForm" action="./php/LoginGamingBank.php" method="post">
                   <input type="email" name="email" size="60" placeholder="Email"> 
                   <input type="password" name="passID" size="60" placeholder="Password">
                   <marquee direction="right" behaviour="alternate">
                     <h4>Eat. Sleep. Game. Repeat.</h4>
                   </marquee>
                   <h4><a href="../RegisterGame.html">
                     <font color="##6271FF">Create Account</font>
                     </a>
                   </h4>
                   <input type="submit" value="Login"> <input type="reset" value="Reset">
                 </form>
                 <div style="background-color: rgba(255, 0, 0, 0.5); color: white; padding: 10px; margin-top: 20px; text-align: center;border-radius: 10px;">
                 Email or password is incorrect
             <br>
             <img src ="https://media1.tenor.com/m/ap6LSaSeQ_kAAAAC/ishowspeed-try-not-to-laugh.gif">
             </div>
               </div>
             </center>
           </body>
         </html>







';
        header("refresh:3;url=../PBLLogin1.html");
        exit();
    }

    $conn->close();
}
?>
 
