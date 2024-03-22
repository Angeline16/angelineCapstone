<?php
include ("../php/connection.php");

/*

 // Initialize popup message variable
$popupMessage = "";
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $category_id = $_POST['category'];
    $item_condition = $_POST['item_condition']; // Correctly retrieve the item_condition value
    $color = $_POST['color'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    $wishlist = $_POST['wishlist'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $brand = $_POST['brand'];

    // Validate that item_condition is not empty
    if(empty($item_condition)) {
        // Handle the case where item_condition is empty
        $popupMessage = "Error: Item condition cannot be empty.";
    } else {
        session_start(); // Start the session if not already started
        // Check if the client_id is set in the session
if (!isset($_SESSION['client_id'])) {
    // Handle the case where the client_id is not set (user not logged in)
    // For example, you might redirect the user to the login page
    header("Location: login.php");
    exit(); // Stop further execution of the script
}
        $client_id = $_SESSION['client_id'];
        // Proceed with the insertion
        // Prepare SQL statement
        $sql = "INSERT INTO item_list (item_name, item_condition, color, size, description, wishlist, price, year, brand) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters with data types
            $stmt->bind_param("sissssssss", $item_name, $category_id, $item_condition, $color, $size, $description, $wishlist, $price, $year, $brand);

            // Execute the statement
            if ($stmt->execute()) {
                // Successful insertion
                $popupMessage = "Item added successfully.";
            } else {
                // Error in insertion
                $popupMessage = "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }else {
            // Error in preparing the statement
            $popupMessage = "Error: Unable to prepare statement.";
        }
    }
}
?>
<?php


// Initialize popup message variable
$popupMessage = "";

// Fetch categories from the database
$categoryOptions = array(); // Initialize empty array
$sql = "SELECT category_id, category_name FROM category_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryOptions[$row['category_id']] = $row['category_name'];
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing form processing code goes here
}

//Close the database connection (not necessary here as PHP will close it automatically at the end of script execution)
$conn->close();

*/

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
            <form action="
">
                <div class="m-2 grid grid-cols-1 sm:grid-cols-2 mx-10">
                    <div class="">
                        <div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Item name <span class="text-red-400">*</span>
                                </p>
                                <input type="text" id="color" name="item_name"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" />
                            </div>
                            <div class="mb-4">

                                <p class="font-semibold">
                                    Category <span class="text-red-400">*</span>
                                </p>
                                <select id="item_condition" name="item_condition"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required>
                                    <option value="">Select Category</option>
                                    <option value="brandNew">Brand New</option>
                                    <option value="used">Used</option>
                                </select>
                            </div>
                            <div class="mb-4">

                                <p class="font-semibold">
                                    Condition <span class="text-red-400">*</span>
                                </p>
                                <select id="item_condition" name="item_condition"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required>
                                    <option value="">Select Condition</option>
                                    <option value="brandNew">Brand New</option>
                                    <option value="used">Used</option>
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
                                <input type="text" id="price" name="price"
                                    class="border p-1 rounded-md text-sm w-full sm:w-3/4" required />
                            </div>
                            <div class="mb-4">
                                <p class="font-semibold">
                                    Year <span class="text-red-400">*</span>
                                </p>
                                <input type="text" id="year" name="year"
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
                                                    accept="image/*" />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
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

    <!-- Popup message
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>
                <?php echo $popupMessage; ?>
            </h2>
        </div>
    </div> -->


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