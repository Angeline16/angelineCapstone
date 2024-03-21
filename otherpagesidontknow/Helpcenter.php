<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Dashboard</title>
    <link rel="stylesheet" href="styles/Helpcenter.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css"> <!-- Link to the external stylesheet -->
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
                <a href="Tradelist.php" class="selected-item" style="color: #000;"><i class="fas fa-tasks"></i>Trade List
                    <!--dropdown-->
                    <!--dropdown arrow-->
                    <i class="fas fa-caret-down dropdown"></i>

                </a>
                <div class="sub-menu">
                    <a href="TradeRequest.php" class="sub-item">Trade Request</a>
                    <a href="#" class="selected-item" style="color: #000;">Trade Completed</a>
                </div>
            </div>
            <div class="item"><a href=""><i class="fas fa-comment-alt"></i>Chat Message</a></div>
            <div class="item"><a href="Helpcenter.php" class="selected-item" style="color: #87ceeb;"><i class="fa fa-question-circle"></i>Help Center</a></div>
        </div>

    </div>

    <!--JQuery CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        <div style="float:right; width: calc(100% - 250px); height: 150vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 95%; margin-top: 25px; padding-left: 40px;">
                <div id="content" style="margin-left: 15px;">
                    <!-- Add Item -->
                    <div class="item">
                        <a href="Dashboard.php"><i class="fas fa-arrow-left"></i></a>
                        <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>Help Center</span>
                            <meta charset="UTF-8"><br>
                            <hr style="margin-top: 10px; border-color: #87ceeb;"> <!-- Line with color -->
                            </head>
                            <div style="padding: 20px; text-align: center;">
                            <p>Hi, how can we help you?</p>
                            <body>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="search()">Search</button>
        <select class="filter-dropdown" id="filterDropdown">
            <option value="all">All</option>
            <option value="filter1">Filter 1</option>
            <option value="filter2">Filter 2</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <script>
        function search() {
            // Get search input value
            var searchValue = document.getElementById("searchInput").value;
            // Get selected filter
            var filterValue = document.getElementById("filterDropdown").value;
            
            // Perform search and filtering logic here
            
            // For demonstration, you can log the values
            console.log("Search:", searchValue);
            console.log("Filter:", filterValue);
        }
    </script>
</body>
</html>