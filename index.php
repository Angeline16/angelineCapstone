<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>OBS Dashboard</title>
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
            background-image: url("assets/3.jpg");
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
</head>

<body class="h-screen">
    <!--header section-->
    <header
        class="bg-cyan-500 shadow-md shadow-cyan-500/50 py-3 px-3 fixed flex sm:justify-center sm:items-center gap-4 top-0 left-0 w-full z-10">
        <div class="logo-container">
            <a href=""><img src="assets/logo.png" class="w-16 h-14" alt="Logo" /></a>
        </div>

        <h1 class="text-xl font-semibold text-start">
            Online Barter System in Municipality of Guinobatan
        </h1>
    </header>
    <div class="flex justify-center items-center h-screen">
        <div>
            <p
                class="text-4xl px-5 sm:text-4xl drop-shadow-lg md:text-5xl lg:text-7xl sm:text-center sm:px-10 font-extrabold">
                Trade for something, trade for someone - trade for yourself.
            </p>
            <div class="flex justify-center my-5 items-center gap-5 py-5">
                <a href="./views/Login.php"
                    class="bg-cyan-500 px-6 py-2 text-base rounded-md shadow-sm transition hover:bg-cyan-500/20 hover:border border-cyan-500 hover:text-cyan-400"><button
                        type="submit">Trader Login</button></a>
                <a href="./admin/Admin.php"
                    class="hover:bg-green-500 hover:text-gray-50 px-6 py-2 text-base rounded-md shadow-sm transition bg-green-500/20 border border-green-500 text-green-400"><button
                        type="button">Admin Login</button></a>
            </div>
        </div>
    </div>
</body>

</html>