<?php
include ("../php/connection.php");
// Start session
session_start();

// Check if the user is not logged in
if (!isset ($_SESSION['logged_in'])) {
    // Redirect to the login page
    header("Location: Login.php");
    exit;
}

// Retrieve categories from the database
$categoryQuery = "SELECT * FROM categories";
$categoryResult = $link->query($categoryQuery);

// Array to store category options
$categories = array();

// Fetch each row from the category result and store it in the $categories array
if ($categoryResult->num_rows > 0) {
    while ($row = $categoryResult->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Check if a category filter has been submitted
if (isset ($_POST['category']) && $_POST['category'] != 'Category') {
    $selectedCategory = $_POST['category'];
    // Query to retrieve items filtered by category
    $getItems = "SELECT items.*, users.UserName AS userName 
                 FROM items 
                 INNER JOIN users ON items.UserID = users.UserID
                 INNER JOIN categories ON items.CategoryId = categories.id
                 WHERE categories.name = '$selectedCategory'";
} else {
    // Query to retrieve all items
    $getItems = "SELECT items.*, users.UserName AS userName 
                 FROM items 
                 INNER JOIN users ON items.UserID = users.UserID";
}

$result = $link->query($getItems);

$items = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    shuffle($items);
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

        .dashboard {
            color: #0e7490;
            font-weight: bold;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <!-- Your existing HTML content -->
    <div class="px-5 py-5 w-full sm:pl-60 bg-white text-gray-800">

        <div class="flex justify-between items-center px-2">
            <h1 class="font-extrabold text-xl">Dashboard</h1>

            <form method="POST">
                <select id="categories" name="category" class="border rounded-md py-1 px-2">
                    <option selected hidden>Category</option>
                    <?php foreach ($categories as $category): ?>

                        <option value="<?php echo $category['name']; ?>">
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit"
                    class="px-2 py-1 shadow bg-cyan-500 text-white hover:bg-cyan-600 transition font-semibold rounded-md">Filter</button>
            </form>
        </div>

        <div class="bg-white py-5">
            <div class="px-5">
                <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-8">
                    <?php if (count($items) > 0): ?>
                        <?php foreach ($items as $item): ?>
                            <!-- Item card -->
                            <a href="ViewProductInfo.php" class="group relative shadow rounded-md p-2">
                                <!-- Item image -->
                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <!-- Display item image or "No Image Available" -->
                                    <?php if (!empty ($item['image'])): ?>
                                        <?php $imageData = base64_encode($item['image']); ?>
                                        <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" alt="Item Image"
                                            class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                                    <?php else: ?>
                                        <p>No Image Available</p>
                                    <?php endif; ?>
                                </div>
                                <!-- Item details -->
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <p class=" capitalize font-extrabold">
                                                <!-- Display item name -->
                                                <?php echo $item['ItemName']; ?>
                                            </p>
                                        </h3>
                                        <!-- Display item's owner -->
                                        <p class="text-sm text-gray-500">Posted by
                                            <?php echo $item['userName']; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Display message when no items are available -->
                        <p class="bg-cyan-500/20 w-full px-2 py-1 rounded-md text-sm text-cyan-600 ">No items found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>