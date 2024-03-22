<?php
include ("../php/connection.php");
session_start();
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
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Online Barter System</title>
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

<body class="h-screen">
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
                <h1>Register</h1>
            </div>
            <form method="post" class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 px-5">
                <div>
                    <img src="../assets/Logo.png" alt="logo" class="sm:w-96 sm:h-80 hidden sm:block" />
                </div>
                <div class="bg-cyan-500/20 px-4 py-3 rounded-md w-96">
                    <div class="flex">
                        <p>Username</p>
                        <span class="text-red-500">*</span>
                    </div>
                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="text" name="username" required />

                    <div class="flex">
                        <p>Email</p>
                        <span class="text-red-500">*</span>
                    </div>
                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="email" name="email" required />

                    <div class="flex">
                        <p>Password</p>
                        <span class="text-red-500">*</span>
                    </div>

                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="password" name="password" required />

                    <div class="flex">
                        <p>Confirm Password</p>
                        <span class="text-red-500">*</span>
                    </div>

                    <input class="w-full p-1 m-1 rounded-md bg-gray-100/30" type="password" name="password" required />

                    <hr class="border border-gray-400/20 my-3" />

                    <button
                        class="px-4 bg-cyan-500 hover:bg-cyan-600 shadow-md transition w-full py-2 rounded-md text-lg font-semibold"
                        type="submit">
                        Register
                    </button>

                    <div class="text-xm py-2 flex gap-1 justify-center items-center">
                        <p class="">Already have an account?</p>
                        <a class="text-red-500" href="Login.php">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="successMessage" class="success-message">
        <?php echo isset ($registration_message) ? $registration_message : ''; ?>
    </div>
</body>

</html>