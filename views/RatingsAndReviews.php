<?php
include ("../php/connection.php");

if (isset($_POST['mark_completed'])) {
    // Retrieve item ID, requester ID, and recipient ID from the form submission
    $itemId = $_POST['itemId'];
    $requesterId = $_POST['requesterId'];
    $recipientId = $_POST['recipientId'];

    // Insert the completed item into the completed_items table
    $stmt = $link->prepare("INSERT INTO completed_items (item_id, requester_id, recipient_id) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $itemId, $requesterId, $recipientId);
    $stmt->execute();

    // You can also add additional logic here, such as updating the status of the item in another table

    // Close statement
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

// Close connection
$link->close();
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

        .star-rating {
            cursor: pointer;
        }

        .star {
            font-size: 24px;
            color: #ddd;
        }

        .star.selected {
            color: gold;
        }
    </style>
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/sidebar.php'; ?>
    <div class="m-3 sm:pl-60 text-gray-800 bg-gray-50">
        <div class="">
            <a href="Dashboard.php" class="text-cyan-600">
                <iconify-icon icon="lets-icons:back-light" class="text-2xl"></iconify-icon>
            </a>
            <h1 class="text-3xl font-extrabold">Rate Product</h1>
        </div>
        <div>
            <hr class="my-2" />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-gray-800">
                <div class="shadow flex justify-start relative items-center">
                    <div class="flex gap-2">
                        <div class="absolute top-0 right-0 z-10 text-white">
                            <form method="post">
                                <input type="hidden" name="itemId" value="56">
                                <input type="hidden" name="requesterId" value="20">
                                <input type="hidden" name="recipientId" value="21">
                                <button type="submit" name="mark_completed" title="Mark as Completed"
                                    class="bg-green-400 p-1 flex justify-center items-center">
                                    <iconify-icon icon="ic:round-check"></iconify-icon>
                                </button>
                            </form>

                        </div>
                        <div>
                            <img src="../assets/uploads/dress.png" class="w-32 h-32 border-r" />
                        </div>
                        <div>
                            <span class="font-semibold">Bag</span>
                            <div>
                                <span class="text-xs font-semibold">Rate:</span>
                                <div id="rating" class="flex gap-1"></div>
                            </div>
                            <span id="rating-text" class="text-green-600 capitalize"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/scripts.js"></script>
    <script>
        const stars = document.getElementById("rating");
        const ratingText = document.getElementById("rating-text");

        // Add event listeners to stars
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement("span");
            star.classList.add("star", "star-rating");
            star.innerHTML = "★";
            star.dataset.value = i;
            star.addEventListener("mouseover", highlightStars);
            star.addEventListener("click", rateItem);
            stars.appendChild(star);
        }

        // Function to highlight stars on mouseover
        function highlightStars(event) {
            const hoveredValue = parseInt(event.target.dataset.value);
            const allStars = Array.from(stars.children);

            allStars.forEach((star, index) => {
                if (index < hoveredValue) {
                    star.classList.add("selected");
                } else {
                    star.classList.remove("selected");
                }
            });
        }

        // Function to rate the item
        function rateItem(event) {
            const rating = parseInt(event.target.dataset.value);
            const selectedStars =
                document.querySelectorAll(".star.selected").length;

            if (selectedStars === rating) {
                ratingText.textContent = getRatingText(rating);
            } else {
                ratingText.textContent = getRatingText(selectedStars);
            }
        }

        // Function to get rating text
        function getRatingText(rating) {
            switch (rating) {
                case 1:
                    return "poor";
                case 3:
                    return "good";
                case 5:
                    return "awesome";
                default:
                    return "average";
            }
        }
    </script>
</body>

</html>