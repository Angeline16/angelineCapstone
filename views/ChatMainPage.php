<?php
include ("../php/connection.php");
session_start();

// Check if the user is logged in
if (isset ($_SESSION['login'])) {
    // Retrieve the user ID from the session
    $loginInfo = $_SESSION['login'];
    $userId = $loginInfo['UserID'];

    // Query to retrieve distinct users with whom the current user has exchanged messages
    $sql = "SELECT DISTINCT m.sender_id, u.Username, u.Image
            FROM messages m
            JOIN users u ON m.sender_id = u.UserID
            WHERE m.receiver_id = $userId
            UNION 
            SELECT DISTINCT m.receiver_id, u.Username, u.Image
            FROM messages m
            JOIN users u ON m.receiver_id = u.UserID
            WHERE m.sender_id = $userId";

    $result = mysqli_query($link, $sql);

    if (!$result) {
        die ("Error in SQL query: " . mysqli_error($link));
    }

    // Fetch result rows as an associative array
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Convert the BLOB data to base64
        $imageData = base64_encode($row['Image']);
        // Create a data URL for the image
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Add image source to the row
        $row['ImageSrc'] = $imageSrc;
        $users[] = $row;
    }

    // Free result set
    mysqli_free_result($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages</title>
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
        <div>
            <h1 class="text-3xl font-extrabold">Messages</h1>
        </div>

        <?php if (empty ($users)): ?>
            <div class="bg-cyan-400/10 p-2 my-5 text-cyan-600 rounded-md">
                No messages yet!
            </div>
        <?php else: ?>
            <?php foreach ($users as $user): ?>
                <div class="flex gap-2 justify-start items-center p-2 my-2 bg-cyan-300/10 rounded-md shadow">
                    <div><img src="<?php echo $user['ImageSrc']; ?>" alt="" class="w-10 h-10 rounded-full"></div>
                    <h1 class="font-semibold capitalize">
                        <?php echo $user['Username']; ?>
                    </h1>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="../scripts/scripts.js"></script>
</body>

</html>