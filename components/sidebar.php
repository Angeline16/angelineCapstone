<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <aside id="sidebar" class="w-60 hidden sm:block bg-gray-100 fixed z-50 top-0 left-0 h-full">
        <div class="px-3">
            <div class="flex justify-between items-center">
                <img src="./assets/Logo.png" alt="" class="w-20 h-14" />
                <div id="close"
                    class="bg-slate-400/50 sm:hidden text-red-400 flex justify-center items-center rounded-full p-1">
                    <iconify-icon icon="iconoir:xmark" class="text-2xl"></iconify-icon>
                </div>
            </div>

            <div>
                <h1 class="text-gray-800 font-semibold text-xl py-3">Menu</h1>
                <hr />
                <div class="my-2">
                    <div
                        class="py-2 flex justify-start items-center gap-2 w-full hover:font-semibold hover:text-cyan-500 hover:bg-gray-300 transition rounded-md px-2">
                        <iconify-icon icon="material-symbols:dashboard" class="text-xl"></iconify-icon>
                        <a href="Dashboard.php">Dashboard</a>
                    </div>
                    <div
                        class="py-2 flex justify-start items-center gap-2 w-full hover:font-semibold hover:text-cyan-500 hover:bg-gray-300 transition rounded-md px-2">
                        <iconify-icon icon="carbon:add-filled" class="text-xl"></iconify-icon>

                        <a href="Add.php">Add Item</a>
                    </div>
                    <div
                        class="py-2 flex justify-start items-center gap-2 w-full hover:font-semibold hover:text-cyan-500 hover:bg-gray-300 transition rounded-md px-2">
                        <iconify-icon icon="ep:list" class="text-xl"></iconify-icon>

                        <a href="Tradelist.php">Trade List</a>
                    </div>
                    <div
                        class="py-2 flex justify-start items-center gap-2 w-full hover:bg-gray-300 hover:font-semibold hover:text-cyan-500 transition rounded-md px-2">
                        <iconify-icon icon="material-symbols-light:chat-sharp" class="text-xl"></iconify-icon>

                        <a href="">Chat Messages</a>
                    </div>
                    <div
                        class="py-2 flex justify-start items-center gap-2 w-full hover:font-semibold hover:text-cyan-500 hover:bg-gray-300 transition rounded-md px-2">
                        <iconify-icon icon="material-symbols:live-help-sharp" class="text-xl"></iconify-icon>

                        <a href="Helpcenter.php">Help Center</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <script></script>
</body>

</html>