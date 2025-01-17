<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Help Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        .help {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800 bg-gray-50">
        <div class="pl-5">
            <a href="Dashboard.php" class="text-cyan-600">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-3xl font-extrabold">Help Center</h1>
        </div>
        <div>
            <hr class="my-2" />
            <div>
                <div>
                    <h1 class="text-2xl font-bold text-center py-5">
                        Hi, how can we help you?
                    </h1>
                    <div class="flex justify-center items-center">
                        <input type="search" placeholder="Search..." name="" class="border outline-none p-2 w-1/2"
                            id="" />
                        <button
                            class="bg-cyan-500 hover:bg-cyan-600 transition text-white p-2 flex justify-center items-center">
                            <iconify-icon icon="material-symbols-light:search" class="text-2xl"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="px-5">
                <h1 class="text-base font-bold pt-5 pb-3">Having a problem?</h1>
                <a href="" class="text-cyan-600"><span class="bg-cyan-200/10 rounded-md px-2 py-1 shadow">Report a
                        problem</span></a>
                <hr class="my-3" />
                <h1 class="text-base font-bold pt-5 pb-3">
                    Looking for something else?
                </h1>
                <p class="text-sm font-semibold">
                    [My Account] How do I change/update my phone number?
                </p>
                <p class="text-sm font-semibold">
                    [Order Cancellation] Can I cancel my order?
                </p>
                <p class="text-sm font-semibold">
                    [Return Refund] What are the effective supporting documents I can
                    submit as evidence for my refund/return request?
                </p>
                <p class="text-sm font-semibold">
                    [My Account] Why is my account being limited?
                </p>
            </div>
        </div>
    </div>

    <script src="../../scripts/scripts.js"></script>
</body>

</html>