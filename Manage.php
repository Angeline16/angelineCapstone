<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Request</title>
    <link rel="stylesheet" href="styles/Manage.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JavaScript for confirmation dialog -->
    <script>
        function confirmDeletion() {
            if (confirm("Are you sure you want to delete this item?")) {
                document.getElementById("deleteForm").submit(); // Submit the form if confirmed
            }
        }
    </script>

</head>

<body>
    <!--Searchbar-->
    <!--header section-->
    <header>
        <table>
            <tr>
                <!--logo-->
                <th><img src="assets/Logo.png" alt="Logo"></th>
                <th>
                    <form>
                        <div class="search">
                            <span class="search-icon fa-solid fa-magnifying-glass"></span>
                            <input type="search" class="search-input" placeholder="Search Filter...">
                        </div>
                    </form>
                </th>
                <th><a href="" class="header-main-icon"><i class="fa-solid fa-bell header-user-icon"></i></a>
                    <a href="Myprofile.php" class="header-main-icon"><i class="fa-solid fa-circle-user  header-user-icon"style="color: #000;"></i></a>
                    <a href="Homepage.php" class="header-main-icon" style="font-size: 25px;"><i class="fa-solid fa-right-from-bracket"></i>
            </tr>
        </table>
    </header>
    <div class="header-main">
    </div>

    <div class="side-bar">

        <!--Menu Bars-->
        <div class="menu">
            <div class="item"><a href="Dashboard.php" class="selected-item" style="color: #000;"><i class="fas fa-list"></i>Dashboard</a></div>
            <div class="item"><a href="Add.php" class="selected-item" style="color: #000;"><i class="fas fa-cart-plus"></i>Add Item</a></div>           
            <div class="item">
                <a href="Tradelist.php" class="selected-item" style="color: #87ceeb;">
                    <i class="fas fa-tasks"></i>Trade List
                    <!--dropdown-->
                    <!--dropdown arrow-->
                    <i class="fas fa-caret-down dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="TradeRequest.php" class="sub-item">Trade Request</a>
                    <a href="TradeComplete.php" class="sub-item">Trade Completed</a>
                </div>
            </div>
            <div class="item"><a href=""><i class="fas fa-comment-alt"></i>Chat Message</a></div>
            <div class="item"><a href="Helpcenter.php"><i class="fa fa-question-circle"></i>Help Center</a></div>
        </div>

    </div>

    <!--JQuery CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Main content -->
    <div id="content" style="margin-left: 15px;">
        <div style="float:right; width: calc(100% - 250px); height: 100vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 100%; margin-top: 25px; padding-left: 40px;">
                <a href="Tradelist.php"><i class="fas fa-arrow-left"></i></a>
                <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>Manage Item</b></span><br>
                <hr style="margin-top: 10px; border-color: #87ceeb;"> <!-- Line with color --><br><br>
                <div class="photo-grid">
                    <div class="grid-item">
                        <img src="assets/Items/Nike.jpg" alt="Items">
                        <div class="grid-item-details"><br></br>
                            <h3>Nike Air Force 1 Blue Paisley</h3>
                            <div class="item"><a href="Request.php"><i class="fas fa-tags"></i>650.00</a></div>
                            <br><p><b>Item Description</b></p>
                            <p>This is original brand i use it once.</p><br>
                            <p><b>Category:</b><span style="padding-left: 50px;">Footwear</span></p>
                            <p><b>Condition:</b><span style="padding-left: 47px;">New</span></p>
                            <p><b>Color:</b><span style="padding-left: 75px;">White & Blue</span></p>
                            <p><b>Size:</b><span style="padding-left: 85px;">42-45</span></p>
                            <p><b>Year:</b><span style="padding-left: 80px;">2021</span></p>
                            <p><b>Brand:</b><span style="padding-left: 70px;">Nike</span></p>
                            <div><br>
                                <div>
                                    <b style="color:red; text-decoration: underline;"><i class="fas fa-hand-holding-heart"></i> Wishlist</b>
                                    <p>Bag</p>
                                    <p>Canned goods</p>
                                    <p>Slippers</p>
                                    <div style="margin-top: 20px; position: absolute;">
                                    <div class="btn-container">
                                    <div class="btn-container">
                                    <div class="btn-container">
    <!-- Add confirmation dialog here -->
    <button type="button" onclick="confirmDeletion()" style="background-color: red; color: white;">Delete</button>
    <!-- Include form elements for sending request -->
    <form id="deleteForm" action="delete_item.php" method="post">
        <input type="hidden" name="item_id" value="123"> <!-- Assuming you have an item ID to identify the item -->
    </form>
    <a href="Update.php"><button type="button" style="margin-left:90px; position: absolute;">Update</button></a>
</div>

<script>
    function confirmDeletion() {
        // Display custom confirmation message
        var confirmMessage = "Are you sure you want to delete this item?";
        var confirmDelete = confirm(confirmMessage);

        // Display additional information message
        var additionalMessage = "By confirming the deletion, you will permanently remove the selected item from the system, and it cannot be recovered or restored.";

        // Combine both messages
        if (confirmDelete) {
            additionalMessage += "\n\n" + "Proceed with deletion?";
        }

        // If user confirms, submit the form
        if (confirmDelete) {
            var finalConfirmation = confirm(additionalMessage);
            if (finalConfirmation) {
                document.getElementById("deleteForm").submit();
            }
        }
    }
</script>
