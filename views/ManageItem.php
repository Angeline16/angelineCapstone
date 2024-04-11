<?php include ("../php/connection.php");
session_start();

// Retrieve item ID from the URL
$itemId = $_GET['item_id'];

// Retrieve item details based on the item ID
$stmt_item = $link->prepare("SELECT * FROM items WHERE ItemID = ?");
$stmt_item->bind_param("i", $itemId);
$stmt_item->execute();
$result_item = $stmt_item->get_result();
$itemData = $result_item->fetch_assoc();

// Close statement
$stmt_item->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        .star-rating {
            cursor: pointer;
        }

        .star {
            font-size: 24px;
            color: #ddd;
        }

        .star.selected {
            color: gold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800 bg-gray-50">
        <div class="">
            <a href="TradeRequest.php" class="text-green-600">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-3xl font-extrabold">Manage Item</h1>
        </div>
        <div>
            <div class="flex justify-center items-center ">

                <div class="grid  py-10 grid-cols-1 gap-x-5 sm:grid-cols-2 m-auto  px-5  ">

                    <div>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($itemData['image']); ?>"
                            alt="Item Image" class=" rounded-md" />
                    </div>
                    <div class="py-5 sm:p-0">
                        <h1 class="text-xl font-extrabold">
                            <?php echo $itemData['ItemName']; ?>
                        </h1>
                        <div>
                            <div class="py-2">
                                <span class="text-sm text-green-600 shadow bg-green-300/10 rounded-full px-2 py-1">
                                    ₱
                                    <?php echo $itemData['price']; ?>
                                </span>
                            </div>
                            <p class="text-sm font-semibold">Item description:</p>
                            <p class="text-sm">
                                <?php echo $itemData['Description']; ?>
                            </p>

                            <!-- Additional information -->
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Category:</p>
                            <p class="text-sm">
                                <?php echo $itemData['CategoryId']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Wishlist:</p>
                            <p class="text-sm">
                                <?php echo $itemData['wishlist']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Condition:</p>
                            <p class="text-sm">
                                <?php echo $itemData['condition']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Color:</p>
                            <p class="text-sm">
                                <?php echo $itemData['color']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Size:</p>
                            <p class="text-sm">
                                <?php echo $itemData['size']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Year:</p>
                            <p class="text-sm">
                                <?php echo $itemData['year']; ?>
                            </p>
                            <hr class="border border-gray-400/10 my-2" />
                            <p class="text-sm font-semibold">Brand:
                                <?php echo $itemData['brand']; ?>
                            </p>
                            <!-- Buttons -->
                            <div class="mb-10 mt-4 flex">
                                <form method="post">
                                    <button type="submit" name="send_request"
                                        class="px-4 py-2 bg-green-500 shadow hover:bg-green-600 transition text-white rounded-md mr-2">
                                        Update
                                    </button>
                                </form>
                                <form method="post" action="Chats.php?recipient_id=<?php echo $recipientId; ?>">
                                    <button type="submit" name="send_message"
                                        class="px-4 py-2 bg-red-500/10 shadow hover:bg-red-600/20 transition text-red-500 rounded-md">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <script src="../scripts/scripts.js"></script>
</body>

</html>