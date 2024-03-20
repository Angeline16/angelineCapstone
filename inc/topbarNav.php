<link rel="stylesheet" href="styles/Dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        
<body>

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
            <th>
                <a href="" class="header-main-icon"><i class="fa-solid fa-bell header-user-icon"></i></a>
                <a href="Myprofile.php" class="header-main-icon"><i class="fa-solid fa-circle-user header-user-icon" style="color: #000;"></i></a>
                <!-- Logout button -->
                <a href="logout.php" id="logoutBtn" class="header-main-icon" style="font-size: 25px;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </th>
        </tr>
    </table>
</header>
