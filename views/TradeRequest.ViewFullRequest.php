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
        <div class="flex">
            <a href="TradeRequest.php" class="text-cyan-600 px-5">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-xl font-extrabold">Vintage Watch</h1>
        </div>

        <!-- request full info -->

        <div class="relative overflow-x-auto py-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-cyan-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">WishList</th>
                        <th colspan="2" scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">
                            Cecilia Lopez
                        </th>
                        <td class="px-6 py-4">Mittens</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-cyan-400/10 px-2 py-1 rounded-full text-cyan-600 shadow">Accept</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-red-400/10 px-2 py-1 rounded-full text-red-600 shadow">Decline</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>