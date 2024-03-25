<?php
// Fetch messages
function fetchMessages($sender_id, $receiver_id, $link)
{
    $query = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp";
    $stmt = $link->prepare($query);
    $stmt->bind_param('iiii', $sender_id, $receiver_id, $receiver_id, $sender_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


// Send message
function sendMessage($sender_id, $receiver_id, $message_content, $link)
{
    // Prepare the SQL query with placeholders
    $query = "INSERT INTO messages (sender_id, receiver_id, message_content, timestamp) VALUES (?, ?, ?, NOW())";

    // Prepare the statement
    $stmt = $link->prepare($query);

    // Bind parameters to the statement
    $stmt->bind_param('iis', $sender_id, $receiver_id, $message_content);

    // Execute the statement
    $result = $stmt->execute();

    // Check if the query was successful
    if ($result) {
        return true; // Message sent successfully
    } else {
        return false; // Error occurred while sending message
    }
}

