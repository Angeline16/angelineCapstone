<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Request</title>
    <link rel="stylesheet" href="styles/Request.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <a href="Myprofile.php" class="header-main-icon"><i class="fa-solid fa-circle-user  header-user-icon" style="color: #000;"></i></a>
                    <a href="Homepage.php" class="header-main-icon" style="font-size: 25px;"><i class="fa-solid fa-right-from-bracket"></i>
                </th>
            </tr>
        </table>
    </header>
    <div class="header-main">
    </div>

    <div class="side-bar">

        <!--Menu Bars-->
        <div class="menu">
        <div class="item"><a href="" class="selected-item" style="color: #000;"><i class="fa fa-home" ></i>Menu</a></div>
            <div class="item"><a href="Dashboard.php" class="selected-item" style="color: #87ceeb;"><i class="fas fa-list"></i>Dashboard</a></div>
            <div class="item"><a href="Add.php" class="selected-item" style="color: #000;"><i class="fas fa-cart-plus"></i>Add Item</a></div>           
            <div class="item"><a href="Tradelist.php" sub-btn><i class="fas fa-tasks"></i>Trade List
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

    <script>
        $(document).ready(function () {
            //jquery for toggle sub-menu
            $('.sub-btn').click(function () {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        });
    </script>
    <!-- Main content -->
    <div id="content" style="margin-left: 15px;">
        <div style="float:right; width: calc(100% - 250px); height: 100vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 100%; margin-top: 25px; padding-left: 40px;">
            <div class="item"><a href="Dashboard.php"><i class="fas fa-arrow-circle-left"></i></a></div><br>
                <div class="photo-grid">
                    <div class="grid-item">
                        <img src="assets/Items/Watch.jpg" alt="Items">
                        <div class="grid-item-details">
                        <h3>Gold Watch</h3>
                            <div class="item"><a href="Request.php"><i class="fas fa-tags"></i>800.00</a></div>
                            <br><p><b>Item Description</b></p><br>
                            <p>Timeless design that effortlessly transitions from day to night, making it suitable for any occasion.</p><br>
                            <p><b>Category:</b><span style="padding-left: 50px;">Jewelry & Watches</span></p>
                            <p><b>Condition:</b><span style="padding-left: 47px;">Used</span></p>
                            <p><b>Color:</b><span style="padding-left: 75px;">Gold</span></p>
                            <p><b>Size:</b><span style="padding-left: 85px;">----</span></p>
                            <p><b>Year:</b><span style="padding-left: 80px;">2022</span></p>
                            <p><b>Brand:</b><span style="padding-left: 70px;">----</span></p>
                            <div><br>
                    <div>
                        <p></p>
                        <b style="color:red; text-decoration: underline;"><i class="fas fa-hand-holding-heart"></i> Wishlist</b>
                        <p>Necklace</p>
                        <p>Ring</p>
                        <p>Bracelet for men</p>
                    </div>
                            <div style="margin-top: 20px; position: absolute;">
                            <div class="container">
                            <button class="send-button">Send Request</button>
                    </div>
                    
                    <!-- Include form elements for sending request -->
                </div>
            </div>
</body>

</html>
