<?php
include ("../php/connection.php");
$itemId = isset ($_GET['id']) ? $_GET['id'] : null;

if ($itemId) {
    // Prepare SQL statement
    $stmt = $link->prepare("SELECT * FROM items WHERE ItemID = ?");
    $stmt->bind_param("i", $itemId);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if result is not empty
    if ($result->num_rows > 0) {
        // Fetch item data
        $itemData = $result->fetch_assoc();

        // Assign item data to variables
        $itemName = $itemData['ItemName'];
        $itemPrice = $itemData['price'];
        $itemDescription = $itemData['Description'];
        $itemCategory = $itemData['CategoryId'];
        $itemCondition = $itemData['condition'];
        $itemColor = $itemData['color'];
        $itemSize = $itemData['size'];
        $itemYear = $itemData['year'];
        $itemBrand = $itemData['brand'];
        $itemImage = $itemData['image'];
        // Convert blob data to base64 format
        $imageData = base64_encode($itemImage);
        // Create image source for HTML
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
    } else {
        // Handle case when item data is not found
        echo "Item not found.";
        exit(); // Exit script
    }
} else {
    // Handle case when item ID is not provided or invalid
    echo "Invalid item ID.";
    exit(); // Exit script
}

// Fetch category name corresponding to the category ID
$categoryQuery = "SELECT name FROM categories WHERE id = ?";
$stmt = $link->prepare($categoryQuery);
$stmt->bind_param("i", $itemCategory);
$stmt->execute();
$categoryResult = $stmt->get_result();

// Check if result is not empty
if ($categoryResult->num_rows > 0) {
    // Fetch category name
    $categoryData = $categoryResult->fetch_assoc();
    $categoryName = $categoryData['name'];
} else {
    // Handle case when category data is not found
    $categoryName = "Category Not Found";
}


// Fetch condition name corresponding to the condition ID
$conditionQuery = "SELECT condi FROM item_condition WHERE id = ?";
$stmt = $link->prepare($conditionQuery);
$stmt->bind_param("i", $itemCondition);
$stmt->execute();
$conditionResult = $stmt->get_result();

// Check if result is not empty
if ($conditionResult->num_rows > 0) {
    // Fetch condition name
    $conditionData = $conditionResult->fetch_assoc();
    $conditionName = $conditionData['condi'];
} else {
    // Handle case when condition data is not found
    $conditionName = "Condition Not Found";
}


// Close statement and database connection
$stmt->close();
$link->close();
?>

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
                    <img src="<?php echo $imageSrc; ?>" alt="Item Image" class=" rounded-md" />
                </div>
                <div class="py-5 sm:p-0">
                    <h1 class="text-xl font-extrabold">
                        <?php echo $itemName; ?>
                    </h1>
                    <div>
                        <div class="py-2">
                            <span class="text-sm text-cyan-600 shadow bg-cyan-300/10 rounded-full px-2 py-1">
                                <?php echo $itemPrice; ?>
                            </span>
                        </div>
                        <p class="text-sm font-semibold">Item description:</p>
                        <p class="text-sm">
                            <?php echo $itemDescription; ?>
                        </p>
                        <!-- Additional information -->
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Category:</p>
                        <p class="text-sm">
                            <?php echo $categoryName; ?>
                        </p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Condition:</p>
                        <p class="text-sm">
                            <?php echo $conditionName; ?>
                        </p>

                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Color:</p>
                        <p class="text-sm">
                            <?php echo $itemColor; ?>
                        </p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Size:</p>
                        <p class="text-sm">
                            <?php echo $itemSize; ?>
                        </p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Year:</p>
                        <p class="text-sm">
                            <?php echo $itemYear; ?>
                        </p>
                        <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Brand:
                            <?php echo $itemBrand; ?>
                        </p>
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