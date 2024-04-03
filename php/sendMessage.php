<?php
// Include your database connection file here
session_start();
// Include your functions file here
include ("connection.php");
include ("messageFunctions.php");


if (isset($_SESSION['login'])) {

    $loginInfo = $_SESSION['login'];
    $id = $loginInfo['UserID'];
    var_dump($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the sender_id, receiver_id, and message_content from the form
        $sender_id = $id; // Assuming you have a session variable storing the current user's ID
        $recipientId = isset($_POST['recipient_id']) ? $_POST['recipient_id'] : null;
        $receiver_id = $recipientId; // Assuming a fixed receiver ID, adjust as needed


        $message_content = $_POST["message_content"];

        // Call the sendMessage function to insert the message into the database
        if (sendMessage($sender_id, $receiver_id, $message_content, $link)) {
            // Message sent successfully
            // You can redirect the user to the chat page or display a success message
            header("Location: ../views/chats.php?recipient_id=" . $receiver_id);
            exit;
        } else {
            // Error occurred while sending message
            // Handle the error (e.g., display an error message)
            echo "Error: Failed to send message.";
        }
    } else {
        // If the form was not submitted via POST method, redirect the user to the form page
        header("Location: ../views/chats.php");
        exit;
    }
}
// Check if the form was submitted
