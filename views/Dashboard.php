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



// // Query to retrieve categories from the database
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

$getItems = "SELECT items.*, users.UserName AS userName 
             FROM items 
             INNER JOIN users ON items.UserID = users.UserID";

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
    </style>
</head>



<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <!-- Your existing HTML content -->
    <div class="px-5 mx-2 py-5 w-full sm:pl-60 h-screen bg-white text-gray-800">

        <div class="flex justify-between items-center">
            <h1 class="font-extrabold text-xl">Dashboard</h1>

            <form class="">
                <select id="countries" class="border rounded-md py-1 px-2">
                    <option selected hidden>Category</option>
                    <?php foreach ($categories as $category): ?>

                        <option value="<?php echo $category['name']; ?>">
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>




        <div class="bg-white py-5">
            <div class="px-5">
                <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 md:grid-cols-4 xl:gap-x-8">
                    <?php foreach ($items as $item): ?>
                        <div class="group relative shadow rounded-md p-2">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <?php if (!empty ($item['image'])): ?>
                                    <?php
                                    $imageData = base64_encode($item['image']);
                                    $src = 'data:image/jpeg;base64,' . $imageData;
                                    ?>
                                    <img src="<?php echo $src; ?>" alt="Item Image"
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                                <?php else: ?>
                                    <p>No Image Available</p>
                                <?php endif; ?>

                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="item_details.php?id=<?php echo $item['ItemID']; ?>" class="font-semibold">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            <?php echo $item['ItemName']; ?>
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-500">Posted by
                                        <?php echo $item['userName']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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