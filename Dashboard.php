<?php
include ("./php/connection.php");
// Start session
session_start();

// Check if the user is not logged in
if (!isset ($_SESSION['logged_in'])) {
    // Redirect to the login page
    header("Location: Login.php");
    exit;
}

// // Query to retrieve categories from the database
// $categoryQuery = "SELECT * FROM category_list";
// $categoryResult = $link->query($categoryQuery);

// // Array to store category options
// $categories = array();

// // Fetch each row from the category result and store it in the $categories array
// if ($categoryResult->num_rows > 0) {
//     while ($row = $categoryResult->fetch_assoc()) {
//         $categories[] = $row;
//     }
// }

// // Query to retrieve items and user information
// $sql = "SELECT item_list.*, client_list.client_id, client_list.Username, category_list.category_name
//         FROM item_list 
//         LEFT JOIN client_list ON item_list.client_id = client_list.client_id
//         LEFT JOIN category_list ON item_list.category_id = category_list.category_id";


// $result = $conn->query($sql);

// // Array to store all the items
// $items = array();

// // Fetch each row from the result and store it in the $items array
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $items[] = $row;
//     }

//     // Shuffle the items array to randomize the display
//     shuffle($items);
// }
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

        .dashboard {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>



<body>
    <?php include 'components/header.php'; ?>
    <?php include 'components/sidebar.php'; ?>
    <!-- Your existing HTML content -->
    <div id="content" style="margin-left: 15px;">
        <!-- Dashboard content -->
        <div
            style="float:right; width: calc(100% - 250px); height: 150vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 95%; margin-top: 25px; padding-left: 40px;">
                <!-- Item List -->
                <div class="item">
                    <!-- Navigation and title -->
                    <a href="Dashboard.php"><i class="fas fa-arrow-left"></i></a>
                    <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>Dashboard</b></span><br>
                    <span class="add-item" style="font-size: 18px; margin-left: 50px;">Item List</span>
                    <hr style="margin-top: 10px; border-color: #87ceeb;"> <!-- Line with color --><br>
                    <!-- Select category dropdown -->
                    <div class="container">
                        <form id="categoryForm">
                            <label for="category">Select Category:</label>
                            <select id="category" name="category" required>
                                <option value="">All Categories</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['category_name']; ?>">
                                        <?php echo $category['category_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                    </div>

                    <!-- Display all items -->
                    <div class="item-list">
                        <?php foreach ($items as $item): ?>
                            <a href="item_details.php?id=<?php echo $item['id']; ?>" class="item-box"
                                data-category="<?php echo $item['category_name']; ?>">
                                <div class="item-info clickable-box">
                                    <div class="image-placeholder">
                                        <?php if (!empty ($item['img_path'])): ?>
                                            <img src="<?php echo $item['img_path']; ?>" alt="Item Image">
                                        <?php else: ?>
                                            <p>No Image Available</p>
                                        <?php endif; ?>
                                    </div>
                                    <h3>
                                        <?php echo $item['item_name']; ?>
                                    </h3>
                                    <p><strong>Category:</strong> <small>
                                            <?php echo $item['category_name']; ?>
                                        </small></p>
                                    <p><strong>Condition:</strong> <small>
                                            <?php echo $item['condition']; ?>
                                        </small></p>
                                    <!-- Add more item details as needed -->
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for filtering items based on category
        document.getElementById('categoryForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission
            var category = document.getElementById('category').value;
            var itemBoxes = document.querySelectorAll('.item-box');
            itemBoxes.forEach(function (box) {
                var boxCategory = box.getAttribute('data-category');
                if (category === '' || category === boxCategory) {
                    box.style.display = 'block'; // Show item box
                } else {
                    box.style.display = 'none'; // Hide item box
                }
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