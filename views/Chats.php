<?php
// Include the database connection file
include ("../php/connection.php");
// Start the session
session_start();

// Check if the user is logged in
if (isset ($_SESSION['login'])) {
    // Retrieve the user ID from the session
    $loginInfo = $_SESSION['login'];
    $id = $loginInfo['UserID'];
    // Include the messageFunctions.php file
    include ("../php/messageFunctions.php");
    // Assign sender_id and receiver_id
    $sender_id = $id;
    $receiver_id = 21; // Assuming a fixed receiver ID, adjust as needed

    // Call fetchMessages() function to get messages
    $messages = fetchMessages($sender_id, $receiver_id, $link);

    // Function to format timestamp to display time
    function formatTimestamp($timestamp)
    {
        return date('h:i A', strtotime($timestamp)); // Format timestamp as 12-hour time
    }



    $receiverQuery = "SELECT * FROM users WHERE UserID = ?";
    $stmt = $link->prepare($receiverQuery);
    $stmt->bind_param('i', $receiver_id);
    $stmt->execute();
    $result = $stmt->get_result();

} else {
    // Redirect the user to the login page or handle the case where the user is not logged in
    header("Location: login.php");
    exit; // Terminate script execution
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
                    $profile_image_blob = $row['image']; // Assuming 'image' is the column name storing the blob data of the profile image
                    if ($profile_image_blob) {
                        // If profile image blob data is available
                        $profile_image_data = base64_encode($profile_image_blob);
                        echo "<img src='data:image/jpeg;base64,$profile_image_data' alt='Receiver Profile Image' class='h-10 w-10 rounded-full'>";
                    } else {
                        // If no profile image is available
                        echo "<div class='h-10 w-10 bg-gray-400 rounded-full'></div>";
                    }
                    echo '</div>';
                    echo '<h1 class="text-xl capitalize font-extrabold">';
                    echo $row['Username']; // Assuming 'Username' is the column name storing the name of the user
                    echo '</h1>';
                }
                ?>
            </div>
        </div>


        <!-- chat box -->

        <div class="p-5 relative">
            <div class="">
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
                </div>

                <!--  send message form -->
                <div class="">
                    <div class="fixed bottom-0 bg-white p-5 sm:pl-64 w-full right-0">
                        <div class="flex w-full justify-center items-center gap-2">
                            <form action="../php/sendMessage.php" method="post"
                                class="flex w-full justify-center items-center gap-2">
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
                                    <input required type="text" class="py-2 px-4 bg-transparent w-full outline-none"
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
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="../scripts/scripts.js"></script>
</body>

</html>