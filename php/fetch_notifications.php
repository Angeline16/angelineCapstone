<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Include connection.php and start session
include ("../php/connection.php");
session_start();

// Retrieve user ID from session
$userId = $_SESSION['login']['UserID'];

// Retrieve trade requests associated with the logged-in user
$stmt = $link->prepare("SELECT * FROM requests WHERE recipient_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Fetch all trade requests
$notifications = [];
while ($row = $result->fetch_assoc()) {
    // Fetch item details associated with the request
    $itemId = $row['item_id'];
    $stmt_item = $link->prepare("SELECT * FROM items WHERE ItemID = ?");
    $stmt_item->bind_param("i", $itemId);
    $stmt_item->execute();
    $result_item = $stmt_item->get_result();
    if ($result_item->num_rows > 0) {
        $itemData = $result_item->fetch_assoc();
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
        $notifications[] = [
            'itemName' => $itemData['ItemName'],
            'recipientName' => $recipientName
        ];
    }
    $stmt_item->close();
}

// Close connection
$link->close();

// Return notifications as JSON
echo json_encode($notifications);