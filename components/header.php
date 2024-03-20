<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="w-full flex sm:pl-60 justify-between items-center bg-cyan-400 py-4 px-5">
        <div class="flex gap-5">
            <button id="toggleSidebar" class="sm:hidden flex justify-center items-center">
                <iconify-icon icon="ic:round-menu" class="text-2xl"></iconify-icon>
            </button>
            <input type="search" placeholder="Search..."
                class="rounded-md bg-gray-100/50 sm:ml-5 caret-blue-500 placeholder:text-base placeholder:text-gray-800 px-4 py-1 sm:w-96 outline-none border" />
        </div>
        <div class="text-2xl flex justify-center items-center gap-2">
            <iconify-icon icon="ic:round-notifications" class="hover:text-gray-100 transition"></iconify-icon>
            <iconify-icon icon="mingcute:user-4-fill" class="hover:text-gray-100 transition"></iconify-icon>
            <iconify-icon icon="solar:settings-bold" class="hover:text-gray-100 transition"></iconify-icon>
        </div>
    </header>
</body>

</html>