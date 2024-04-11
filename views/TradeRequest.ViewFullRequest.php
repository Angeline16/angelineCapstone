<?php
include ("../php/connection.php");
session_start();

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // Fetch item ID associated with the request from the requests table
    $itemInfoQuery = "SELECT item_to_trade FROM requests WHERE request_id = ?";
    $stmt = $link->prepare($itemInfoQuery);
    $stmt->bind_param('i', $request_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $userInfoQuery = "SELECT * FROM users WHERE UserID IN (SELECT requester_id FROM requests WHERE request_id = ?)";
    $stmt = $link->prepare($userInfoQuery);
    $stmt->bind_param('i', $request_id);
    $stmt->execute();
    $resultForUserName = $stmt->get_result();

    // Fetching the user information if available
    if ($row = $resultForUserName->fetch_assoc()) {
        $userName = $row['Username'];
    }

    // Fetching the item ID if available
    if ($row = $result->fetch_assoc()) {
        $item_id = $row['item_to_trade'];

        // Fetch item name based on the item ID
        $itemNameQuery = "SELECT ItemName FROM items WHERE ItemID = ?";
        $stmt = $link->prepare($itemNameQuery);
        $stmt->bind_param('i', $item_id);
        $stmt->execute();
        $itemResult = $stmt->get_result();

        // Fetching the item name if available
        if ($itemRow = $itemResult->fetch_assoc()) {
            $itemName = $itemRow['ItemName'];
        } else {
            $itemName = "Item Not Found";
        }
    } else {
        $itemName = "Item Not Found";
    }
}
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
    <div class="m-3 sm:pl-60 text-gray-800 bg-gray-50">
        <div class="flex">
            <a href="TradeRequest.php" class="text-cyan-600 px-5">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-xl font-extrabold">Vintage Watch</h1>
        </div>

        <!-- request full info -->

        <div class="relative overflow-x-auto py-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-cyan-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">WishList</th>
                        <th colspan="2" scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">
                            <?php echo $userName; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $itemName; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-cyan-400/10 px-2 py-1 rounded-full text-cyan-600 shadow">Accept</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-red-400/10 px-2 py-1 rounded-full text-red-600 shadow">Decline</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>