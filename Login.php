<?php
// At the beginning of the file
session_start();

// Check if the user is already logged in
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Redirect to dashboard
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform your login validation here
    // For example, you can check the username and password against your database
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish database connection
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "TradeSystem";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a Users table with columns Username and Password
    $sql = "SELECT * FROM client_list WHERE Username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variable and redirect to dashboard
            $_SESSION['logged_in'] = true;
            header("Location: Dashboard.php");
            exit();
        } else {
            // Incorrect password
            $login_error = "Invalid username or password. Please try again.";
        }
    } else {
        // User not found
        $login_error = "Invalid username or password. Please try again.";
    }
}

// Check if registration message exists and display it
if (isset($_SESSION['registration_message'])) {
    $registration_message = $_SESSION['registration_message'];
    // Display the message
    echo "<div class='success-message'>$registration_message</div>";
    // Unset the session variable to clear the message
    unset($_SESSION['registration_message']);
}

?>

<!DOCTYPE html>
<html>
<title>Online Barter System</title>
<link rel="stylesheet" href="styles/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/Login.css">
<style>
        /* CSS for success message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 9999;
            animation: fadeOut 10s forwards; /* Fade out animation */
            opacity: 0; /* Initially hidden */
        }

        /* Keyframe for fade out animation */
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
<body>
<table>
    <tr>
        <th style="padding-left: 150px; padding-right:150px; "><img style="width: 300px; height: 200px;" src="assets/Logo.png"></th>
        <th style="margin-left: 30px; ">               
            <div class="LoginContainer"> 
                <h1 >TRADER LOGIN</h1>
                <form method="post">
                    <div style="float: left; margin-left: 15px;">Username <span style="color: red;">*</span></div>
                    <input class="inputL" type="text" name="username" required><br> <br>
                    <div style="float: left; margin-left: 15px;">Password <span style="color: red;">*</span></div>
                    <input class="inputL" type="password" name="password" required><br>
                    <?php if (isset($login_error)): ?>
                        <div style="color: red;"><?php echo $login_error; ?></div><br>
                    <?php endif; ?>
                    <a class="forgotpass"  href="Homepage.php"> Back to Site</a><br></br>
                    <a class="forgotpass"  href="Forgotpass.php"> Forgot password?</a><br></br>
                    <div class="donthave">Don't have an account? <a  class="dec" href="Register.php">Register?</a></div><br></br>
                    <button class="loginbtn" type="submit">Login</button>
                </form>

            </div>
        </th>
    </tr>

<script>
    // JavaScript to hide the success message after a few seconds
    setTimeout(function(){
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000); // Adjust the time as needed (in milliseconds)
</script>
</body>

</html>
