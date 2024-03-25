<?php
include ("../php/connection.php");
session_start();
?>
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
            <a href="#"
                class="px-3 py-1 bg-cyan-500 cursor-pointer text-white font-bold rounded-md shadow hover:bg-cyan-600 transition">
                Request
            </a>
            <a href="TradeCompleted.php" class="text-sm cursor-pointer font-semibold hover:text-cyan-500 transition">
                Completed
            </a>
        </div>

        <div class="flex justify-start">
            <h1 class="text-xl font-extrabold">Trade Request</h1>
        </div>

        <!-- item request -->
        <div class="w-full shadow p-2 my-3 rounded-md border relative">
            <div class="flex justify-start items-center gap-2">
                <div>
                    <img src="../assets//uploads/watch.png" class="w-20 h-20" alt="" />
                </div>
                <div>
                    <p class="font-semibold text-base mb-2">Vintage Watch</p>
                    <span
                        class="text-xs shadow flex gap-1 bg-cyan-300/10 justify-start items-center px-4 py-1 text-cyan-600 rounded-md"><span
                            class="font-semibold text-sm">Jm</span> sent you a
                        request</span>
                </div>
            </div>
            <div class="absolute top-2 right-5">
                <a href="TradeRequest.ViewFullRequest.php"
                    class="bg-green-400 px-3 cursor-pointer py-1 text-xs rounded-full shadow text-white hover:bg-green-500 transition">
                    View Full Request
                </a>
            </div>
        </div>

        <div class="w-full shadow p-2 my-3 rounded-md border relative">
            <div class="flex justify-start items-center">
                <div>
                    <img src="../assets//uploads/dress.png" class="w-20 h-20" alt="" />
                </div>
                <div>
                    <p class="font-semibold text-base mb-2">Vintage Dress</p>
                    <span
                        class="text-xs shadow flex gap-1 bg-cyan-300/10 justify-start items-center px-4 py-1 text-cyan-600 rounded-md"><span
                            class="font-semibold text-sm">Cla</span> sent you a
                        request</span>
                </div>
            </div>
            <div class="absolute top-2 right-5">
                <button
                    class="bg-green-400 px-3 py-1 text-xs rounded-full shadow text-white hover:bg-green-500 transition">
                    View Full Request
                </button>
            </div>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>