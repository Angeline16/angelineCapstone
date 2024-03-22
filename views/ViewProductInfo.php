<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        html,
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="px-5 py-5 w-full sm:pl-60 bg-white text-gray-800">
        <a href="Dashboard.php" class="text-cyan-600 px-5">
            <iconify-icon icon="lets-icons:back-light" class="text-3xl"></iconify-icon>
        </a>
        <div class="flex justify-center items-center ">

            <div class="grid  py-10 grid-cols-1 gap-x-5 sm:grid-cols-2 m-auto  px-5  ">

                <div>
                    <img src="../assets/uploads/dress.png" alt="" class=" rounded-md" />
                </div>
                <div class="py-5 sm:p-0">
                    <h1 class="text-xl font-extrabold">Flower Necklace</h1>
                    <div>
                        <div class="py-2">
                            <span class="text-sm text-cyan-600 shadow bg-cyan-300/10 rounded-full px-2 py-1">$349</span>
                        </div>
                        <p class="text-sm font-semibold">Item description:</p>
                        <p class="text-sm">
                            The necklace features a stunning gold chain and a delicate
                            flower pendant that is sure to catch the eye.
                        </p>
                        <!-- Additional information -->
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Category:</p>
                        <p class="text-sm">Jewelry</p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Condition:</p>
                        <p class="text-sm">New</p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Color:</p>
                        <p class="text-sm">Gold</p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Size:</p>
                        <p class="text-sm">One Size</p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Year:</p>
                        <p class="text-sm">2022</p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Brand: ?</p>

                        <!-- Buttons -->
                        <div class="mb-10 mt-4 ">
                            <button
                                class="px-4 py-2 bg-cyan-500 shadow hover:bg-cyan-600 transition text-white rounded-md mr-2">
                                Send Request
                            </button>
                            <button
                                class="px-4 py-2 bg-green-500 shadow hover:bg-green-600 transition text-white rounded-md">
                                Send Message
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