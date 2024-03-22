<?php

include("../php/connection.php");
// At the beginning of the file
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to dashboard
    header("Location: Dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_email = mysqli_real_escape_string($link, $_POST['email']);
    $login_password = $_POST['password'];
    // prevent SQL injection
    $stmt = mysqli_prepare($link, "SELECT * FROM users WHERE Email=?");
    mysqli_stmt_bind_param($stmt, "s", $login_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user data
    $getuser = mysqli_fetch_assoc($result);

    if ($getuser) {

        $stored_hashed_password = $getuser['Password']; // get the hashed pass in the database

        if (password_verify($login_password, $stored_hashed_password)) {
            // Store user ID in session
            $_SESSION['user_id'] = $getuser['UserID'];
            $_SESSION['logged_in'] = true;
            header("Location: Dashboard.php");
            exit(); // Exit after redirect
        } else {
            $login_error = "Invalid username or password. Please try again.";
        }
    } else {
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

    html,
    body {
        height: 100%;
        font-family: "Nunito", sans-serif;
        margin: 0;
        padding: 0;
        color: whitesmoke;
        position: relative;
        /* Ensure proper positioning */
    }

    body {
        overflow: hidden;
        /* Hide overflow from pseudo-element */
    }

    body::before {
        content: "";
        background-image: url("../assets/3.jpg");
        background-size: cover;
        background-position: center;
        filter: blur(4px);
        /* Adjust the blur radius as needed */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;
        /* Ensure the pseudo-element is behind other content */
    }
</style>

<body>
    <!--header section-->
    <header
        class="bg-cyan-500 shadow-md shadow-cyan-500/50 py-3 px-3 fixed flex sm:justify-center sm:items-center gap-4 top-0 left-0 w-full z-10">
        <div class="logo-container">
            <a href=""><img src="../assets/logo.png" class="w-16 h-14" alt="Logo" /></a>
        </div>

        <h1 class="text-xl font-semibold text-start">
            Online Barter System in Municipality of Guinobatan
        </h1>
    </header>
    <div class="flex justify-center items-center h-screen">
        <div>
            <div class="text-4xl px-5 py-4 drop-shadow-lg sm:text-start text-center sm:px-10 font-extrabold">
                <h1>Login</h1>
            </div>
            <form method="post" class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 px-5">
                <div>
                    <img src="../assets/Logo.png" alt="logo" class="sm:w-96 sm:h-80 hidden sm:block" />
                </div>
                <div class="bg-cyan-500/20 px-4 py-3 rounded-md w-96">
                    <div class="flex">
                        <p>Email</p>
                        <span class="text-red-500">*</span>
                    </div>
                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="email" name="email" required />

                    <div class="flex">
                        <p>Password</p>
                        <span class="text-red-500">*</span>
                    </div>

                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="password" name="password"
                        required /><br />
                    <?php if (isset ($login_error)): ?>
                        <div class="text-red-500 text-xs px-3 py-1 bg-red-400/20 my-2 rounded-md">
                            <?php echo $login_error; ?>
                        </div>
                        <br />
                    <?php endif; ?>
                    <div class="flex justify-between items-center">
                        <a class="flex justify-start items-center text-sm" href="../index.php">
                            <iconify-icon icon="ion:caret-back" class="text-green-500"></iconify-icon>
                            <span>Back to Site</span></a>
                        <a class="flex justify-center items-center text-sm" href="Forgotpass.php">
                            <span class="underline">Forgot password?</span></a>
                    </div>
                    <hr class="border border-gray-400/20 my-3" />

                    <button
                        class="px-4 bg-cyan-500 hover:bg-cyan-600 shadow-md transition w-full py-2 rounded-md text-lg font-semibold"
                        type="submit">
                        Login
                    </button>

                    <div class="text-xm py-2 flex gap-1 justify-center items-center">
                        <p class="">Don't have an account?</p>
                        <a class="text-red-500" href="Register.php">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <script>
        // JavaScript to hide the success message after a few seconds
        setTimeout(function () {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // Adjust the time as needed (in milliseconds)
    </script>
</body>

</html>