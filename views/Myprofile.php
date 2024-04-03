<?php
include '../php/connection.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['login'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE UserID = $user_id";
$result = mysqli_query($link, $sql);

// Check if query was successful
if ($result) {
    // Fetch user data
    $userData = mysqli_fetch_assoc($result);
} else {
    // Handle error (e.g., display error message)
    echo "Error: " . mysqli_error($link);
}

// Fetch gender options from the database
$sql_gender = "SELECT * FROM gender";
$result_gender = mysqli_query($link, $sql_gender);

// Check if query was successful
if ($result_gender) {
    // Fetch gender options into an array
    $genders = mysqli_fetch_all($result_gender, MYSQLI_ASSOC);
} else {
    // Handle error (e.g., display error message)
    echo "Error: " . mysqli_error($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800">
        <div class="">
            <a href="Dashboard.php" class="text-cyan-600">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-3xl font-extrabold">My Profile</h1>
        </div>
        <div>
            <p class="text-sm text-gray-700">Manage and protect your account</p>
            <hr class="my-2" />
            <form action="" method="post" enctype="multipart/form-data" class="py-5">
                <div class="m-2 grid grid-cols-1 sm:grid-cols-2">
                    <div class="mb-4">
                        <p class="font-semibold">
                            UserName <span class="text-red-400">*</span>
                        </p>
                        <input type="text" required id="color" name="name" value="<?php echo $userData['Username']; ?>"
                            class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">
                            Name <span class="text-red-400">*</span>
                        </p>
                        <input type="text" required id="color" name="name" value="<?php echo $userData['Username']; ?>"
                            class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">
                            Email <span class="text-red-400">*</span>
                        </p>
                        <input type="email" required id="color" name="email" value="<?php echo $userData['Email']; ?>"
                            class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">
                            Phone Number <span class="text-red-400">*</span>
                        </p>
                        <input type="number" required id="color" name="phone_num"
                            value="<?php echo $userData['phone_num']; ?>"
                            class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">
                            Gender <span class="text-red-400">*</span>
                        </p>
                        <select name="gender" id="" class="w-full sm:w-3/4 p-1 rounded-md border">
                            <?php foreach ($genders as $gender): ?>
                                <option value="<?php echo $gender['gender_id']; ?>" <?php echo ($gender['gender_id'] == $userData['gender']) ? 'selected' : ''; ?>>
                                    <?php echo $gender['gender']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">
                            Date of Birth <span class="text-red-400">*</span>
                        </p>
                        <input type="date" required id="color" name="date_birth"
                            value="<?php echo $userData['date_of_birth']; ?>"
                            class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                    </div>
                    <div class="mb-4">
                        <div class="col-span-full">
                            <p class="font-semibold">
                                Select Image <span class="text-red-400">*</span>
                            </p>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Browse on your</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only"
                                                accept="image/*" onchange="updateFileName(this)" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p id="file-name"
                                        class="text-xs leading-5 text-gray-600 bg-gray-400/10 rounded-md p-2">
                                        No file chosen
                                    </p>
                                    <p class="text-xs leading-5 text-gray-600">
                                        Note: Make sure image should be gif, jpeg, or png format.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex gap-3">
                        <button
                            class="px-4 py-1 bg-gray-400/20 rounded-md text-gray-800 hover:bg-gray-400/50 transition font-semibold shadow">
                            Cancel
                        </button>
                        <button
                            class="px-5 py-1 bg-green-500 rounded-md text-white hover:bg-green-600 transition font-semibold shadow">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>