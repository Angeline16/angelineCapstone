<?php if (isset ($_SESSION['login'])) {
    // Retrieve the user profile picture from the session
    $loginInfo = $_SESSION['login'];
    $profile = $loginInfo['image'];
}

// Function to convert blob data to base64 encoded string
function blobToBase64($blobData)
{
    return 'data:image/png;base64,' . base64_encode($blobData);
}