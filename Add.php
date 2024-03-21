<?php
include ("./php/connection.php");
// // Establish database connection
// $conn = new mysqli('localhost', 'root', '', 'TradeSystem');

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Initialize popup message variable
// $popupMessage = "";
// // Process form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $item_name = $_POST['item_name'];
//     $category_id = $_POST['category'];
//     $item_condition = $_POST['item_condition']; // Correctly retrieve the item_condition value
//     $color = $_POST['color'];
//     $size = $_POST['size'];
//     $description = $_POST['description'];
//     $wishlist = $_POST['wishlist'];
//     $price = $_POST['price'];
//     $year = $_POST['year'];
//     $brand = $_POST['brand'];

//     // Validate that item_condition is not empty
//     if(empty($item_condition)) {
//         // Handle the case where item_condition is empty
//         $popupMessage = "Error: Item condition cannot be empty.";
//     } else {
//         session_start(); // Start the session if not already started
//         // Check if the client_id is set in the session
// if (!isset($_SESSION['client_id'])) {
//     // Handle the case where the client_id is not set (user not logged in)
//     // For example, you might redirect the user to the login page
//     header("Location: login.php");
//     exit(); // Stop further execution of the script
// }
//         $client_id = $_SESSION['client_id'];
//         // Proceed with the insertion
//         // Prepare SQL statement
//         $sql = "INSERT INTO item_list (item_name, item_condition, color, size, description, wishlist, price, year, brand) 
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         if ($stmt) {
//             // Bind parameters with data types
//             $stmt->bind_param("sissssssss", $item_name, $category_id, $item_condition, $color, $size, $description, $wishlist, $price, $year, $brand);

//             // Execute the statement
//             if ($stmt->execute()) {
//                 // Successful insertion
//                 $popupMessage = "Item added successfully.";
//             } else {
//                 // Error in insertion
//                 $popupMessage = "Error: " . $stmt->error;
//             }

//             // Close statement
//             $stmt->close();
//         }else {
//             // Error in preparing the statement
//             $popupMessage = "Error: Unable to prepare statement.";
//         }
//     }
// }
?>
<?php


// // Initialize popup message variable
// $popupMessage = "";

// // Fetch categories from the database
// $categoryOptions = array(); // Initialize empty array
// $sql = "SELECT category_id, category_name FROM category_list";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $categoryOptions[$row['category_id']] = $row['category_name'];
//     }
// }

// // Process form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Your existing form processing code goes here
// }

// // Close the database connection (not necessary here as PHP will close it automatically at the end of script execution)
// $conn->close();
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

    <?php include 'components/header.php'; ?>
    <?php include 'components/sidebar.php'; ?>

    <div id="content" style="margin-left: 15px;">
        <div
            style="float:right; width: calc(100% - 250px); height: 150vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 95%; margin-top: 25px; padding-left: 40px;">
                <div id="content" style="margin-left: 15px;">
                    <!-- Add Item -->
                    <div class="item">
                        <a href="Dashboard.php"><i class="fas fa-arrow-left"></i></a>
                        <div>
                            <h1 class="text-2xl">Add new item</h1>
                        </div>

                        <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>Add New Item</b></span>
                        <meta charset="UTF-8">
                        <hr style="margin-top: 10px; border-color: #87ceeb;"> <!-- Line with color -->

                        <div class="container">
                            <form action="Add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group"><br>
                                    <label for="item_name">Item Name*</label>
                                    <input type="text" id="item_name" name="item_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category*</label>
                                    <select id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($categoryOptions as $category_id => $category_name): ?>
                                            <option value="<?php echo $category_id; ?>">
                                                <?php echo $category_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="item_condition">Condition*</label>
                                    <select id="item_condition" name="item_condition" required>
                                        <option value="">Select Condition</option>
                                        <option value="brandNew">Brand New</option>
                                        <option value="used">Used</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" id="color" name="color">
                                </div>
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" id="size" name="size">
                                </div>
                                <div class="form-group">
                                    <label for="description">Item Description*</label>
                                    <textarea id="description" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="wishlist">Wishlist*</label>
                                    <input type="text" id="wishlist" name="wishlist" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price*</label>
                                    <input type="text" id="price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" id="year" name="year">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" id="brand" name="brand">
                                </div>
                                <div class="form-group">
                                    <label for="img">Upload Image</label>
                                    <input type="file" id="img" name="img" accept="image/*">
                                </div>

                                <!-- Remove the commented-out form and button -->
                                <button type="submit">Save</button>
                                <button type="button">Cancel</button>
                                <!-- Remove the commented-out form-group -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup message -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>
                <?php echo $popupMessage; ?>
            </h2>
        </div>
    </div>


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