<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Dashboard</title>
    <link rel="stylesheet" href="styles/Update.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Searchbar-->
    <!--header section-->
    <header>
        <table>
            <tr>
                <!--logo-->
                <th><img src="assets/logo.png" alt="Logo"></th>
                <th>
                    <form>
                        <div class="search">
                            <span class="search-icon fa-solid fa-magnifying-glass"></span>
                            <input type="search" class="search-input" placeholder="Search Filter...">
                        </div>
                    </form>
                </th>
                <th><a href="" class="header-main-icon"><i class="fa-solid fa-bell header-user-icon"></i></a>
                    <a href="Myprofile.php" class="header-main-icon"><i class="fa-solid fa-circle-user  header-user-icon" style="color: #000;"></i></a>
                    <a href="Homepage.php" class="header-main-icon" style="font-size: 25px;"><i class="fa-solid fa-right-from-bracket"></i>
                </th>
            </tr>
        </table>
    </header>

    <div class="header-main">
    </div>
    </div>

    <div class="side-bar">

        <!--Menu Bars-->
        <div class="menu">
            <div class="item"><a href="Dashboard.php" class="selected-item" style="color: #000;"><i class="fas fa-list"></i>Dashboard</a></div>
            <div class="item"><a href="Add.php" class="selected-item" style="color: #000;"><i class="fas fa-cart-plus"></i>Add Item</a></div>
            <div class="item">
                <a class="sub-btn" style="color: #87ceeb;"><i class="fas fa-tasks"></i>Trade List
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
            <div class="item"><a href=""><i class="fa fa-question-circle"></i>Help Center</a></div>
        </div>

    </div>

    <!--JQuery CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
             //jquery for toggle sub-menu
            $('.sub-btn').click(function(){
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        });
    </script>
    <!-- Main content -->
    <div id="content" style="margin-left: 15px;">
        <div style="float:right; width: calc(100% - 250px); height: 150vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 95%; margin-top: 25px; padding-left: 40px;">
                <div id="content" style="margin-left: 15px;">
                    <!-- Add Item -->
                    <!-- Add Item -->
<div class="item">
    <a href="Manage.php"><i class="fas fa-arrow-left"></i></a>
    <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>Update Item</b></span><br>
    <meta charset="UTF-8">
    <div class="container"><br><br>
        <form action="Manage.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <div class="form-group">
                        <label for="itemName">Item Name*</label>
                        <input type="text" id="itemName" name="itemName" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <select id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="clothing">Clothing</option>
                            <option value="jewelry">Jewelry & Watches</option>
                            <option value="mobile">Mobile Phones & Gadgets</option>
                            <option value="footwear">Footwear</option>
                            <option value="home">Home & Kitchen</option>
                            <option value="instruments">Musical Instruments</option>
                            <option value="bag's">Men/Women Bag's</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="condition">Condition*</label>
                        <select id="condition" name="condition" required>
                            <option value="">Select Condition</option>
                            <option value="brandNew">Brand New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" id="color" name="color">
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" id="size" name="size">
                    </div>
                    <div class="form-group">
                        <label for="description">Item Description*</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="wishlist">Wishlist*</label>
                        <input type="text" id="wishlist" name="wishlist" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price*</label>
                        <input type="text" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" id="brand" name="brand">
                    </div>
                    <div class="item">
                        <label for="image">Select Image:</label>
                        <input type="file" id="image" name="image" onchange="displayImage(this)">
                    </div>
                    </div>
            <!-- Container for displaying uploaded image -->
                    <div id="imageContainer"></div>
                </div>
            </div>
            <!-- Remove the commented-out form and button -->
            <button type="submit">Save</button>
            <button type="button">Cancel</button>
        </form>
<script>
        // JavaScript function to display uploaded image
        function displayImage(input) {
            var imageContainer = document.getElementById('imageContainer');

            // Check if a file is uploaded
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Create a new <img> tag for the uploaded image
                    var img = document.createElement("img");
                    img.src = e.target.result;
                    img.id = "uploadedImage";

                    // Display the image inside #imageContainer
                    imageContainer.innerHTML = '';
                    imageContainer.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]); // Read the uploaded file as URL
            }
        }
    </script>
</body>

</html>
