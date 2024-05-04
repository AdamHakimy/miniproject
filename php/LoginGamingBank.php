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
  
  <style>
    body {
      background-image: url("https://images.hdqwalls.com/wallpapers/2023-battlefield-2042-game-4k-21.jpg");
      background-size: cover;
    }
	  input[type=email], input[type=password] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 10px 0;
      display: inline-block;
      border: none;
      border-bottom: 1px solid #fff; /* Change border color to white */
      background: rgba(255, 255, 255, 0.1); /* Adjust background color for better visibility */
      color: white; /* Change text color to white */
	  border-radius: 10px;
    }
	
  </style>
</head>
<body>
  <center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 10px;
      width: 30%;
      margin: 0 auto;
	  border-radius: 10px;">
      <br>
      <img src="https://cdn-icons-png.flaticon.com/512/4704/4704504.png" width="60" height="60">
      <h1>Login to GamingBank</h1>
      <h3>Use your Google Account</h3>
      <form id="loginForm" action="LoginGamingBank.php" method="post">
        <table border="0">
          <tr>
            <td colspan="2"><h2>Email</h2></td>
          </tr>
          <tr>
            <td colspan="2"><input type="email" name="email" size="60" ></td>
          </tr>
          <tr>
            <td colspan="2"><h2>Password</h2> </td>
          </tr>
          <tr>
            <td colspan="2"><input type="password" name="passID" size="60"></td>
          </tr>
          <tr>
            <td colspan="2"><marquee direction="right"  behaviour="alternate">
            <h4>Eat. Sleep. Game. Repeat.</h4></marquee></td>
          </tr>
          <tr>
            <td><h4><a href="RegisterGame.html"><font color="#4CAF50">Create Account</font></a></h4></td>
            <td align="right">
              <input type="submit" value="Login" style="background-color:#4CAF50; padding: 10px; color: white; border: none; cursor: pointer; border-radius: 10px;">
              <input type="reset" value="Reset" style="background-color:#4CAF50; padding: 10px; color: white; border: none; cursor: pointer; border-radius: 10px;">
            </td>
          </tr>
        </table>
      </form>
    <div style="background-color: rgba(255, 0, 0, 0.5); color: white; padding: 10px; margin-top: 20px; text-align: center;border-radius: 10px;">
        Email or password is incorrect
		<br>
		<img src ="https://media1.tenor.com/m/ap6LSaSeQ_kAAAAC/ishowspeed-try-not-to-laugh.gif">
		</div>
	</div>
  </center>
</body>
</html>';
        header("refresh:3;url=../PBLLogin1.html");
        exit();
    }

    $conn->close();
}
?>
 
