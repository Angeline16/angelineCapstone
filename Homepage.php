<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Dashboard</title>
    <link rel="stylesheet" href="styles/Homepage.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-image: url('assets/3.jpg'); /* Adjust the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Source Sans Pro', sans-serif; /* Applying Google Font */
            text-align: center; /* Center align all content */
            color: white; /* Text color */
        }

        .header-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px; /* Adjust font size as needed */
            font-weight: bold; /* Adjust font weight as needed */
            text-shadow: 2px 2px 4px rgba(50, 50, 50, 50); /* Adding text shadow */
            color: white;
        }
    </style>
</head>

<body>
    <!--header section-->
    <header>
        <div class="logo-container">
            <a href=""><img src="assets/logo.png" alt="Logo"></a>
        </div>
        <div class="header-main">
            <p><b>Online Barter System in Municipality of Guinobatan</b></p>
        </div>
        <div class="header-text">
            <br><p>Trade for something, trade for someone - trade for yourself.</p>
            <div class="login-container">
            <a href="Login.php"><button type="submit">Trader Login</button>
            <a href="Admin.php"><button type="button">Admin Login</button>
        </div>
    </header>
</body>

</html>
