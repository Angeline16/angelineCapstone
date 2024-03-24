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
            <a href="Dashboard.php" class="text-cyan-600 px-5">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <div class="flex justify-center gap-2 items-center">
                <div class="h-10 w-10 bg-cyan-500 rounded-full"></div>
                <h1 class="text-xl font-extrabold">Cecilia Lopez</h1>
            </div>
        </div>

        <!-- chat box -->

        <div class="p-5 relative">
            <div class="">
                <div class="my-2">
                    <div class="flex justify-start w-3/4">
                        <span class="relative bg-gray-300/50 px-3 py-1 rounded-md">
                            <span class="absolute -top-6 text-xs right-0">2:50 pm</span>
                            <span class="">Hi good morning! Where are we going to meet up po?</span>
                        </span>
                    </div>
                </div>

                <div class="my-10">
                    <div class="flex justify-end ml-[30%]">
                        <span class="relative bg-cyan-300/50 px-3 py-1 rounded-md">
                            <span class="absolute -top-6 text-xs left-0">2:51 pm</span>
                            <span class="">Hello☺️, i’m only available on saturday 1 o’clock in the
                                afternoon.</span>
                        </span>
                    </div>
                </div>
            </div>

            <!--  send message form -->
            <div class="">
                <div class="fixed bottom-0 p-5 sm:pl-64 w-full right-0">
                    <div class="flex w-full gap-2">
                        <div class="flex justify-center items-center gap-2">
                            <div class="flex justify-center items-center">
                                <button type="submit"
                                    class="p-2 flex justify-center items-center bg-blue-400/10 hover:bg-blue-400/20 transition text-xl shadow text-blue-400 rounded-full">
                                    <iconify-icon icon="ri:file-add-fill"></iconify-icon>
                                </button>
                            </div>
                            <div class="flex justify-center items-center">
                                <button type="submit"
                                    class="p-2 flex justify-center items-center bg-blue-400/10 hover:bg-blue-400/20 transition text-xl shadow text-blue-400 rounded-full">
                                    <iconify-icon icon="heroicons:camera-solid"></iconify-icon>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center w-full items-center rounded-full border mx-3 gap-2">
                            <input type="text" class="py-2 px-4 bg-transparent w-full outline-none" />

                            <button type="submit"
                                class="mx-2 flex justify-center items-center py-1.5 pl-2 pr-1 bg-cyan-400/10 hover:bg-cyan-400/20 transition text-xl shadow text-cyan-500 rounded-full">
                                <iconify-icon icon="basil:send-solid"></iconify-icon>
                            </button>
                        </div>

                        <div class="flex justify-center items-center">
                            <button type="submit"
                                class="p-2 flex justify-center items-center bg-green-400/10 hover:bg-green-400/20 transition text-xl shadow text-green-500 rounded-full">
                                <iconify-icon icon="solar:like-bold"></iconify-icon>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>