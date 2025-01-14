<?php
include ("../php/connection.php");
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['login'])) {
    // Retrieve the user ID from the session
    $loginInfo = $_SESSION['login'];
    $id = $loginInfo['UserID'];
    include ("../php/messageFunctions.php");

    $sender_id = $id;
    if (isset($_GET['recipient_id'])) {
        $recipient_id = $_GET['recipient_id'];
        $receiver_id = $recipient_id;
    }

    // Get the item ID if it's provided in the URL
    $itemId = isset($_GET['item_id']) ? $_GET['item_id'] : null;

    // Call fetchMessages() function to get messages
    $messages = fetchMessages($sender_id, $receiver_id, $link);

    // Function to format timestamp to display time
    function formatTimestamp($timestamp)
    {
        return date('h:i A', strtotime($timestamp)); // Format timestamp as 12-hour time
    }

    // Retrieve receiver information
    $receiverQuery = "SELECT * FROM users WHERE UserID = ?";
    $stmt = $link->prepare($receiverQuery);
    $stmt->bind_param('i', $receiver_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch item information based on item ID
    $itemQuery = "SELECT * FROM items WHERE ItemID = ?";
    $stmt = $link->prepare($itemQuery);
    $stmt->bind_param('i', $itemId);
    $stmt->execute();
    $itemResult = $stmt->get_result();

} else {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

        body {
            font-family: "Nunito", sans-serif;
        }

        .chat {
            color: #0e7490;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800">
        <div class="flex justify-start items-center">
            <a href="Dashboard.php" class="text-cyan-600 px-5">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>

            <div class="flex justify-center gap-2 items-center">
                <?php
                if ($row = $result->fetch_assoc()) {
                    echo '<div class="h-10 w-10 bg-cyan-500 rounded-full">';
                    $profile_image_blob = $row['image'];
                    if ($profile_image_blob) {
                        $profile_image_data = base64_encode($profile_image_blob);
                        echo "<img src='data:image/jpeg;base64,$profile_image_data' alt='Receiver Profile Image' class='h-10 w-10 rounded-full'>";
                    } else {
                        echo "<div class='h-10 w-10 bg-gray-400 rounded-full'></div>";
                    }
                    echo '</div>';
                    echo '<h1 class="text-xl capitalize font-extrabold">';
                    echo $row['Username'];
                    echo '</h1>';
                }
                ?>
            </div>
        </div>

        <?php
        if ($itemResult->num_rows > 0) {
            $itemData = $itemResult->fetch_assoc();
            ?>
            <div class="flex justify-end my-5 mr-5">
                <span class="flex gap-2 bg-gray-500/10 px-4 py-2 rounded-md">
                    <div>
                        <h1 class="font-semibold text-base text-cyan-500 capitalize"><?php echo $itemData['ItemName']; ?>
                        </h1>
                        <span class="text-sm">Posted by <?php echo $row['Username']; ?></span>
                    </div>
                    <div>
                        <?php
                        $item_image_blob = $itemData['image'];
                        if ($item_image_blob) {
                            $item_image_data = base64_encode($item_image_blob);
                            echo "<img src='data:image/jpeg;base64,$item_image_data' class='w-12 h-12' alt='Item Image'>";
                        } else {
                            echo "<div class='w-12 h-12 bg-gray-400'></div>";
                        }
                        ?>
                    </div>
                </span>
            </div>
        <?php } ?>

        <div class="p-5 relative">
            <div>
                <?php if (empty($messages)): ?>
                    <p class="text-cyan-600 p-2 rounded-md bg-cyan-400/10">No messages yet.</p>
                <?php else: ?>
                    <?php foreach ($messages as $message): ?>
                        <div class="my-2">
                            <?php if ($message['sender_id'] == $sender_id): ?>
                                <div class="flex justify-end ml-[30%]">
                                <?php else: ?>
                                    <div class="flex justify-start w-3/4">
                                    <?php endif; ?>
                                    <span
                                        class="relative <?php echo $message['sender_id'] == $sender_id ? 'bg-cyan-300/50' : 'bg-gray-300/50'; ?> px-3 py-1 rounded-md">
                                        <span
                                            class="absolute -top-0 text-xs <?php echo $message['sender_id'] == $sender_id ? '-left-16' : '-right-16'; ?>">
                                            <?php echo formatTimestamp($message['timestamp']); ?>
                                        </span>
                                        <span>
                                            <?php echo htmlspecialchars($message['message_content']); ?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div>
                    <div class="fixed bottom-0 bg-white p-5 sm:pl-64 w-full right-0">
                        <div class="flex w-full justify-center items-center gap-2">
                            <form action="../php/sendMessage.php" method="post"
                                class="flex w-full justify-center items-center gap-2">
                                <input type="hidden" name="recipient_id" value="<?php echo $receiver_id; ?>">
                                <div class="flex justify-center items-center gap-2">
                                    <div class="flex justify-center items-center">
                                        <button
                                            class="p-2 flex justify-center items-center bg-blue-400/10 hover:bg-blue-400/20 transition text-xl shadow text-blue-400 rounded-full">
                                            <iconify-icon icon="ri:file-add-fill"></iconify-icon>
                                        </button>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <button
                                            class="p-2 flex justify-center items-center bg-blue-400/10 hover:bg-blue-400/20 transition text-xl shadow text-blue-400 rounded-full">
                                            <iconify-icon icon="heroicons:camera-solid"></iconify-icon>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-center w-full items-center rounded-full border mx-3 gap-2">
                                    <input required type="text"
                                        class="py-2 caret-cyan-500 px-4 bg-transparent w-full outline-none"
                                        name="message_content" />

                                    <button type="submit"
                                        class="mx-2 flex justify-center items-center py-1.5 pl-2 pr-1 bg-cyan-400/10 hover:bg-cyan-400/20 transition text-xl shadow text-cyan-500 rounded-full">
                                        <iconify-icon icon="basil:send-solid"></iconify-icon>
                                    </button>
                                </div>

                                <div class="flex justify-center items-center">
                                    <button type="submit"
                                        class="p-2 flex justify-center items-center bg-green-400/10 hover:bg-green-400/20 transition text-xl shadow text-green-500 rounded-full">
                                        <iconify-icon icon="solar:like-bold"></iconify-icon>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../scripts/scripts.js"></script>
</body>

</html>