<?php
include ("../php/connection.php");
session_start();

// Retrieve user ID from session
$userId = $_SESSION['login']['UserID'];

// Retrieve trade requests associated with the logged-in user
$stmt = $link->prepare("SELECT * FROM requests WHERE recipient_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
// Close statement
$stmt->close();

// Retrieve items associated with the logged-in user
$stmt_user_items = $link->prepare("SELECT * FROM items WHERE userId = ?");
$stmt_user_items->bind_param("i", $userId);
$stmt_user_items->execute();
$result_user_items = $stmt_user_items->get_result();
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

        .trade {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800">
        <div class="">
            <h1 class="text-3xl font-extrabold">Trade</h1>
        </div>
        <div class="flex justify-start items-center gap-5 py-3">
            <a href="#"
                class="px-3 py-1 bg-cyan-500 cursor-pointer text-white font-bold rounded-md shadow hover:bg-cyan-600 transition">
                Request
            </a>
            <a href="TradeCompleted.php" class="text-sm cursor-pointer font-semibold hover:text-cyan-500 transition">
                Completed
            </a>
        </div>

        <div class="flex justify-start">
            <h1 class="text-xl font-extrabold">Trade Request</h1>
        </div>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Fetch item details associated with the request
                $itemId = $row['item_id'];
                $stmt_item = $link->prepare("SELECT * FROM items WHERE ItemID = ?");
                $stmt_item->bind_param("i", $itemId);
                $stmt_item->execute();
                $result_item = $stmt_item->get_result();
                if ($result_item->num_rows > 0) {
                    $itemData = $result_item->fetch_assoc();
                    // Decode the blob image data
                    $imageData = base64_encode($itemData['image']);

                    // Fetch recipient's name based on requester_id
                    $requesterId = $row['requester_id'];
                    $stmt_recipient = $link->prepare("SELECT Username FROM users WHERE UserID = ?");
                    $stmt_recipient->bind_param("i", $requesterId);
                    $stmt_recipient->execute();
                    $result_recipient = $stmt_recipient->get_result();
                    if ($result_recipient->num_rows > 0) {
                        $recipientData = $result_recipient->fetch_assoc();
                        $recipientName = $recipientData['Username'];
                    } else {
                        $recipientName = "Unknown";
                    }
                    $stmt_recipient->close();
                    ?>
                    <div class="w-full shadow p-2 my-3 rounded-md border relative">
                        <div class="flex justify-start items-center gap-2">
                            <div>

                                <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" class="w-20 h-20" alt="" />
                            </div>
                            <div>
                                <p class="font-semibold text-base mb-2">
                                    <?php echo $itemData['ItemName']; ?>
                                </p>
                                <span
                                    class="text-xs shadow flex gap-1 bg-cyan-300/10 justify-start items-center px-4 py-1 text-cyan-600 rounded-md">
                                    <span class="font-semibold text-sm">
                                        <?php echo $recipientName; ?>
                                    </span> sent you a request
                                </span>
                            </div>
                        </div>
                        <div class="absolute top-2 right-5">
                            <a href="TradeRequest.ViewFullRequest.php?request_id=<?php echo $row['request_id']; ?>"
                                class="bg-green-400 px-3 cursor-pointer py-1 text-xs rounded-full shadow text-white hover:bg-green-500 transition">
                                View Full Request
                            </a>
                        </div>
                    </div>
                    <?php
                }
                $stmt_item->close();
            }
        } else {
            // No trade requests found for the user
            echo "<p class='bg-cyan-400/10 p-2 rounded-md text-cyan-600'>No trade requests found.</p>";
        }
        ?>

        <div class="pb-5">
            <div class="flex justify-start">
                <h1 class="text-xl font-extrabold py-5">Your Items</h1>
            </div>
            <div>
                <div class="relative overflow-x-auto py-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-cyan-500">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Item Name</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Manage</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            <?php
                            if ($result_user_items->num_rows > 0) {
                                while ($row = $result_user_items->fetch_assoc()) {
                                    ?>
                                    <tr class='bg-white border-b'>
                                        <td class='px-6 py-4'>
                                            <?php echo $row['ItemID']; ?>
                                        </td>
                                        <td class='px-6 py-4'>
                                            <?php echo $row['ItemName']; ?>
                                        </td>
                                        <td class='px-6 py-4'>$
                                            <?php echo number_format($row['price'], 2); ?>
                                        </td>
                                        <td class='px-6 py-4'>
                                            <iconify-icon icon="material-symbols:edit"
                                                class="text-xl text-green-500"></iconify-icon>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan='3' class='text-center'>No items found.</td>
                                </tr>
                                <?php
                            }
                            $stmt_user_items->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>