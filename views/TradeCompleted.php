<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        .trade {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800">
        <div class="">
            <h1 class="text-3xl font-extrabold">Trade</h1>
        </div>
        <div class="flex justify-start items-center gap-5 py-3">
            <a href="TradeRequest.php" class="text-sm cursor-pointer font-semibold hover:text-cyan-500 transition">
                Request
            </a>
            <a href="#"
                class="px-3 py-1 bg-cyan-500 cursor-pointer text-white font-bold rounded-md shadow hover:bg-cyan-600 transition">
                Completed
            </a>
        </div>

        <div class="flex justify-start">
            <h1 class="text-xl font-extrabold">Trade Completed</h1>
        </div>

        <!-- item request -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-3 2xl:grid-cols-3">
            <div class="w-full shadow p-2 my-3 rounded-md border relative">
                <div class="flex justify-start gap-2">
                    <div>
                        <img src="../assets//uploads/watch.png" class="w-36 h-36" alt="" />
                    </div>
                    <div>
                        <p class="font-extrabold text-base mb-2">
                            Posted by <span class="text-cyan-500">Jm</span>
                        </p>
                        <p class="py-2">To watch my baby.</p>
                        <span class="rounded-md text-sm font-semibold text-cyan-600 bg-cyan-300/20 px-3 py-1">
                            <span>PHP</span> 6000</span>
                    </div>
                </div>
                <div class="absolute top-2 right-5">
                    <button class="bg-cyan-400 px-3 py-1 text-xs rounded-full shadow text-white">
                        Completed
                    </button>
                </div>
            </div>

            <div class="w-full shadow p-2 my-3 rounded-md border relative">
                <div class="flex justify-start gap-2">
                    <div>
                        <img src="../assets//uploads/watch.png" class="w-36 h-36" alt="" />
                    </div>
                    <div>
                        <p class="font-extrabold text-base mb-2">
                            Posted by <span class="text-cyan-500">Jm</span>
                        </p>
                        <p class="py-2">To watch my baby.</p>
                        <span class="rounded-md text-sm font-semibold text-cyan-600 bg-cyan-300/20 px-3 py-1">
                            <span>PHP</span> 6000</span>
                    </div>
                </div>
                <div class="absolute top-2 right-5">
                    <button class="bg-cyan-400 px-3 py-1 text-xs rounded-full shadow text-white">
                        Completed
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>