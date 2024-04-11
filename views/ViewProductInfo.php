<?php
include ("../php/connection.php");
session_start();

$itemId = isset($_GET['id']) ? $_GET['id'] : null;

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
        $wishlist = $itemData['wishlist'];
        $itemBrand = $itemData['brand'];
        $itemImage = $itemData['image'];
        // Convert blob data to base64 format
        $imageData = base64_encode($itemImage);
        // Create image source for HTML
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        // Get the recipient ID (UserID associated with the item)
        $recipientId = $itemData['UserID'];
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

// Check if the request button is clicked
// Check if the request button is clicked
if (isset($_POST['send_request'])) {
    if (isset($_SESSION['login'])) {
        // Retrieve logged-in user's information
        $loginInfo = $_SESSION['login'];
        $requesterId = $loginInfo['UserID']; // Assuming UserID is the correct field


        // Get the selected item ID from the hidden input field
        $selectedItemId = isset($_POST['selected_item_id']) ? $_POST['selected_item_id'] : null;

        // Check if an item is selected
        if ($selectedItemId) {
            // Insert the request and selected item into the database
            $stmt = $link->prepare("INSERT INTO requests (item_id, item_to_trade, requester_id, recipient_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiii", $itemId, $selectedItemId, $requesterId, $recipientId);
            $stmt->execute();

            // Redirect to prevent form resubmission on page refresh
            $_SESSION['request_success'] = true;
            header("Location: Dashboard.php");
            exit(); // Make sure to exit after redirection
        }
        if ($requesterId == $recipientId) {
            // Display an error message
            echo "<p class='text-red-500 absolute top-20 sm:left-1/2 left-[25%] bg-red-500/10 px-4 py-2 shadow rounded-md text-base font-semibold'>You can't request your own item.</p>";
        } else {
            // Handle case when no item is selected
            echo "<p class='text-red-500 absolute top-20 sm:left-1/2 left-[25%] bg-red-500/10 px-4 py-2 shadow rounded-md text-base font-semibold'>Please select an item to trade.</p>";
        }
    } else {

    }
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
$user_id = $_SESSION['user_id'];

// Fetch distinct item names associated with the current user
$stmt = $link->prepare("SELECT DISTINCT ItemID, ItemName FROM items WHERE UserID = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$itemsResult = $stmt->get_result();


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
    <div class="px-5 py-5 w-full sm:pl-60 bg-gray-50 text-gray-800">
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
                        <!-- <hr class="border border-gray-400/10 my-2" />
                        <p class="text-sm font-semibold">Wishlist:</p>
                        <p class="text-sm">
                            <?php echo $wishlist; ?>
                        </p> -->
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
                        <hr class="my-2">


                        <div class="my-4"><span
                                class="bg-cyan-500/10 rounded-md text-cyan-500 px-4 py-1 font-semibold">Select items
                                to trade</span>
                            <div class="py-3 flex gap-2">
                                <?php
                                // Check if there are any items associated with the user
                                if ($itemsResult->num_rows > 0) {
                                    // Output buttons for each item
                                    while ($item = $itemsResult->fetch_assoc()) {
                                        echo '<button onclick="selectItem(' . $item['ItemID'] . ', this)" class="capitalize border item-button bg-gray-500/10 rounded-full text-gray-500 px-4 py-1 font-semibold">' . $item['ItemName'] . '</button>';
                                    }
                                } else {
                                    // If no items, display a message
                                    echo '<p class="px-3 py-1 bg-gray-500/10 text-sm font-semibold rounded-md text-gray-500">You have no products to trade for.</p>';
                                }
                                ?>
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="mb-10 mt-4 flex">
                            <form method="post">
                                <input type="hidden" name="selected_item_id" id="selectedItemId">
                                <button type="submit" name="send_request" <?php echo $itemsResult->num_rows <= 0 ? 'disabled' : ''; ?>
                                    class=" <?php echo $itemsResult->num_rows <= 0 ? 'cursor-not-allowed bg-gray-500/10 text-gray-500 px-4 py-2 rounded-md mr-2' : 'px-4 py-2 bg-cyan-500 shadow hover:bg-cyan-600 transition text-white rounded-md mr-2'; ?>">
                                    Send Request
                                </button>
                            </form>
                            <form method="post"
                                action="Chats.php?recipient_id=<?php echo $recipientId; ?>&item_id=<?php echo $itemId; ?>">
                                <button type="submit" name="send_message"
                                    class="px-4 py-2 bg-green-500 shadow hover:bg-green-600 transition text-white rounded-md">
                                    Send Message
                                </button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/scripts.js"></script>
    <script>
        // JavaScript function to handle item selection
        function selectItem(itemId, button) {
            // Reset style for all buttons
            var buttons = document.querySelectorAll('.item-button');
            buttons.forEach(function (btn) {
                btn.classList.remove('text-cyan-500', 'border-cyan-500');
                btn.classList.add('text-gray-500', 'border');
                btn.style.backgroundColor = 'transparent';
                btn.classList.remove('shadow');
            });

            // Highlight selected button
            button.classList.remove('text-gray-500');
            button.classList.add('text-cyan-500', 'border-cyan-500');
            button.classList.remove('border');
            button.style.backgroundColor = '#ebf4ff'; // Cyan-blue-100
            button.classList.add('shadow');

            // Set the selected item ID in the hidden input field
            document.getElementById('selectedItemId').value = itemId;
            console.log("Selected Item ID:", itemId);
        }
    </script>
</body>

</html>