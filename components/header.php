<?php
if (isset ($_SESSION['login'])) {
    // Retrieve the user profile picture from the session
    $loginInfo = $_SESSION['login'];
    $profile = $loginInfo['image'];
}

// Function to convert blob data to base64 encoded string
function blobToBase64($blobData)
{
    return 'data:image/png;base64,' . base64_encode($blobData);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header class="w-full flex sm:pl-60 justify-between items-center bg-cyan-400 text-gray-800 py-4 px-5">
        <div class="flex gap-5">
            <button id="toggleSidebar" class="sm:hidden flex justify-center items-center">
                <iconify-icon icon="ic:round-menu" class="text-2xl"></iconify-icon>
            </button>
            <input type="search" placeholder="Search..."
                class="rounded-md bg-gray-100/50 sm:ml-5 caret-blue-500 placeholder:text-base placeholder:text-gray-800 px-4 py-1 sm:w-96 outline-none border" />
        </div>
        <div class="text-2xl flex justify-center items-center gap-2">

            <a href="Myprofile.php" class="flex justify-center items-center">
                <iconify-icon icon="ic:round-notifications" class="hover:text-gray-100 transition"></iconify-icon>
            </a>
            <a href="Myprofile.php" class="flex justify-center items-center">
                <?php if (isset ($profile) && !empty ($profile)): ?>
                    <img src="<?php echo blobToBase64($profile); ?>" alt="Profile Picture"
                        class="rounded-full w-5 h-5 sm:w-8 sm:h-8">
                <?php else: ?>
                    <div class='h-8 flex justify-center items-center w-8 bg-gray-300/50 shadow rounded-full'><iconify-icon
                            icon="tabler:user-filled" class="hover:text-gray-100 transition"></iconify-icon>
                    </div>
                <?php endif; ?>
            </a>

            <a href="../php/logout.php" class="flex justify-center items-center">
                <iconify-icon icon="solar:logout-broken" class="hover:text-gray-100 transition"></iconify-icon>
            </a>
        </div>
    </header>
</body>

</html>