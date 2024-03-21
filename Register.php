<?php
include ("./php/connection.php");

// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user information into the database
    $sql = "INSERT INTO users (Username, Email, Password) VALUES ('$username', '$email', '$hashed_password')";
    // After setting the registration message
    if ($link->query($sql) === TRUE) {
        $registration_message = "Registration Complete";
        // Start session and store the message
        session_start();
        $_SESSION['registration_message'] = $registration_message;
        // Redirect to login page after registration
        header("Location: Login.php");
        exit(); // Make sure to terminate the script after redirection
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Online Barter System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/Register.css">
    <style>
        /* CSS for success message pop-up */
        .success-message {
            display:
                <?php echo isset ($registration_message) ? 'block' : 'none'; ?>
            ;
            position: fixed;
            top: 20px;
            /* Adjust the top position as needed */
            right: 20px;
            /* Adjust the right position as needed */
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 9999;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease;
        }

        /* Hover effect */
        .success-message:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th style="padding-left: 150px; padding-right:150px; "><img style="width: 300px; height: 200px;"
                    src="assets/Logo.png"></th>
            <th style="margin-left: 30px; ">
                <div class="RegisterContainer">
                    <h1>TRADER REGISTER</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div style="float: left; margin-left: 15px;">Username <span style="color: red;">*</span></div>
                        <input class="inputR" type="text" name="username" required><br><br>
                        <div style="float: left; margin-left: 15px;">Email <span style="color: red;">*</span></div>
                        <input class="inputR" type="email" name="email" required><br>
                        <div style="float: left; margin-left: 9px; padding: 10px">Password <span
                                style="color: red;">*</span></div>
                        <input class="inputR" type="password" name="password" required><br>
                        <div style="float: left; margin-left: 9px; padding: 10px">Confirm Password <span
                                style="color: red;">*</span></div>
                        <input class="inputR" type="password" name="confirm_password" required><br>
                        <div class="have">Already have an account? <a class="dec" href="Login.php">Login</a></div>
                        <br></br>

                        <button class="registerbtn" type="submit">Register</button>
                    </form>
            </th>
        </tr>
    </table>

    <div id="successMessage" class="success-message">
        <?php echo isset ($registration_message) ? $registration_message : ''; ?>
    </div>

</body>

</html>