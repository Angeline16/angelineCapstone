<?php
include ("../php/connection.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $item_name = $_POST['item_name'];
    $category_name = $_POST['category_name'];
    $condition_id = $_POST['condition']; // Retrieve the ID of the condition
    $color = $_POST['color'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    $wishlist = $_POST['wishlist'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $brand = $_POST['brand'];

    // Check if a file was uploaded
    if (isset($_FILES['file-upload'])) {
        // Get the contents of the image file
        $image_data = file_get_contents($_FILES['file-upload']['tmp_name']);

        // Escape special characters to prevent SQL injection
        $image_data = $link->real_escape_string($image_data);
    }
    // Query to get category ID
    $category_query = "SELECT id FROM categories WHERE name = '$category_name'";
    $category_result = $link->query($category_query);
    if ($category_result->num_rows > 0) {
        $category_row = $category_result->fetch_assoc();
        $category_id = $category_row['id'];
    } else {
        echo "Error: Category not found";
        exit();
    }

    // Retrieve UserID from session
    $user_id = $_SESSION['user_id'];

    /* 
    
    *
    *
        one way to get the  user's id is by using the following code
    *
    *

    if (isset($_SESSION['login'])) {
        // Retrieve the user ID from the session
        $loginInfo = $_SESSION['login'];
        $userId = $loginInfo['UserID'];
        $userName = $loginInfo['Username'];
        $userEmail = $loginInfo['Email'];
    }

    *
    *
        so in login page you dont want to set every user data for every variables
    *
    *
    */

    // Query to check if the user exists
    $user_query = "SELECT UserID FROM users WHERE UserID = '$user_id'";

    $user_result = $link->query($user_query);
    if ($user_result->num_rows == 0) {
        echo "Error: User not found";
        exit();
    }

    // Insert data into the database
    $sql = "INSERT INTO items (ItemName, CategoryId, `condition`, color, size, Description, wishlist, price, year, brand, UserID, image) 
            VALUES ('$item_name', '$category_id', '$condition_id', '$color', '$size', '$description', '$wishlist', '$price', '$year', '$brand', '$user_id', '$image_data')";

    if ($link->query($sql) === TRUE) {
        header("Location: $_SERVER[PHP_SELF]?status=success"); //  Redirect back to the profile page with a success
        exit();
    } else {
        header("Location: $_SERVER[PHP_SELF]?status=error"); //  Send them back with an error message
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        .add {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>

    <div class="text-gray-800 bg-gray-50 sm:pl-60 pt-5">
        <h1 class="text-xl font-semibold ml-10">Add new Item</h1>
        <div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="m-2 grid grid-cols-1 sm:grid-cols-2 mx-10">
                    <div class="">
                        <div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Item name <span class="text-red-400">*</span>
                                </p>
                                <input type="text" required id="color" name="item_name"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Category <span class="text-red-400">*</span>
                                </p>
                                <select id="categories" name="category_name"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    // Query to fetch categories
                                    $category_query = "SELECT id, name FROM categories";
                                    $category_result = $link->query($category_query);
                                    if ($category_result->num_rows > 0) {
                                        while ($category = $category_result->fetch_assoc()) {
                                            echo "<option value='" . $category['name'] . "'>" . $category['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Condition <span class="text-red-400">*</span>
                                </p>
                                <select id="item_condition" name="condition"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required>
                                    <option value="">Select Condition</option>
                                    <?php
                                    // Query to fetch conditions
                                    $condition_query = "SELECT id, condi FROM item_condition";
                                    $condition_result = $link->query($condition_query);
                                    if ($condition_result->num_rows > 0) {
                                        while ($condition = $condition_result->fetch_assoc()) {
                                            echo "<option value='" . $condition['id'] . "'>" . $condition['condi'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <p class="font-semibold">
                                    Color <span class="text-red-400">*</span>
                                </p>
                                <input type="text" id="color" name="color"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Size <span class="text-red-400">*</span>
                                    <br>
                                    <small><i>Please specified if the measurement given is in cm, inches,
                                            etc.</i></small>
                                </p>
                                <input type="text" id="size" name="size"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Item Description <span class="text-red-400">*</span>
                                </p>
                                <textarea id="description" name="description"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required></textarea>
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Wishlist <span class="text-red-400">*</span>
                                </p>
                                <input type="text" id="wishlist" name="wishlist"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Price <span class="text-red-400">*</span>
                                </p>
                                <input type="number" id="price" name="price"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Year <span class="text-red-400">*</span>
                                </p>
                                <input type="number" id="year" name="year"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Brand <span class="text-red-400">*</span>
                                </p>
                                <input type="text" id="brand" name="brand"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <div class="col-span-full">
                                <label for="cover-photo"
                                    class="block text-sm font-medium leading-6 text-gray-900">Upload Image <span
                                        class="text-red-400">*</span></label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
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
                                            class="text-xs leading-5 text-gray-600 bg-gray-400/10 rounded-md p-2">No
                                            file chosen</p>
                                        <p class="text-xs leading-5 text-gray-600">
                                            Note: Make sure image should be gif, jpeg, or png
                                            format.
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center gap-10 mx-10 mb-5 sm:w-1/2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-1/2 py-2 px-4 rounded">
                        Save
                    </button>
                    <button type="button"
                        class="bg-gray-500 hover:bg-gray-700 text-white w-1/2 font-bold py-2 px-4 rounded">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Check for the status query parameter
    $status = isset($_GET['status']) ? $_GET['status'] : '';

    if ($status == 'success') {
        echo "<div id='successNotification' class='fixed bottom-0 right-0 mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded'>New record created successfully</div>";
    } elseif ($status == 'error') {
        echo "<div id='errorNotification' class='fixed bottom-0 right-0 mb-4 mr-4 bg-red-500 text-white px-4 py-2 rounded'>Error in creating a record.</div>";
    }
    ?>


    <!--JQuery CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>


        $(document).ready(function () {
            //jquery for toggle sub-menu
            $('.sub-btn').click(function () {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });


        });

        setTimeout(function () {
            document.getElementById('successNotification').style.display = 'none';
        }, 2000);

        function updateFileName(input) {
            const fileName = input.files[0].name;
            document.getElementById('file-name').innerText = fileName;
        }


        const toggleButton = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");
        const closeSidebar = document.getElementById("close");

        toggleButton.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });
        closeSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });



    </script>

</body>

</html>