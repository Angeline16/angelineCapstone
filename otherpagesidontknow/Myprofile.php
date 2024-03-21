<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS Dashboard</title>
    <link rel="stylesheet" href="styles/MyProfile.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .profile-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .profile-details .item {
            display: flex;
            flex-direction: column;
        }

        .profile-details .item label {
            margin-bottom: 5px;
        }

        .profile-details .item input,
        .profile-details .item select,
        .profile-details .item button {
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
        }

        .btn-container {
            display: flex;
            justify-content: left;
            margin-top: 30px;
        }

        .btn-container button {
            margin: 0 5px;
            color: white;
        }
        /* Profile styling */
.profile {
  font-size: 16px;
  color: #87ceeb; /* Light blue color */
}

/* Dropdown styling */
.container select {
  padding: 10px; /* Padding for the select element */
  font-size: 16px; /* Font size for the select element */
  border: 1px solid #ccc; /* Border style */
  border-radius: 5px; /* Border radius to make it rounded */
  background-color: #f9f9f9; /* Background color */
  color: #333; /* Text color */
  width: 200px; /* Set width as needed */
}

/* Style when select element is hovered */
.container select:hover {
  border-color: #87ceeb; /* Change border color on hover */
}

/* Style when select element is focused */
.container select:focus {
  outline: none; /* Remove outline */
  border-color: #87ceeb; /* Change border color when focused */
}
    </style>
</head>

<body>
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
    <div class="menu">
    <div class="side-bar">
    <div>
    <p class="profile">Profile</p>
    <div class="container">
    <select id="category" name="category" required>
        <option value="">Profile</option>
        <option value="">Edit Profile</option>
    </select>
    </div>
            <div class="item"><a href=""><i class="fas fa-comment-alt"></i>Chat Message</a></div>
        </div>
    </div>

    <div id="content" style="margin-left: 15px;">
        <div style="float:right; width: calc(100% - 250px); height: 150vh; margin-top: 5px; border-radius: 20px; background-color: white;">
            <div style="background-color: white; color: #1D242E; width: 95%; margin-top: 25px; padding-left: 40px;">
                <!-- My Profile -->
                <div class="item">
    <a href="Dashboard.php"><i class="fas fa-arrow-left"></i></a>
    <span class="add-item" style="font-size: 25px; margin-left: 10px;"><b>My Profile</b></span><br>
    <span class="add-item" style="font-size: 15px; margin-left: 45px;">Manage and protect your account</span>
    <hr style="margin-top: 10px; border-color: #87ceeb;"> <!-- Line with color -->
</div>
                    <br><div class="profile-details">
                    <div class="item">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="" readonly>
                    </div>
                    <div class="item">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="">
                    </div>
                    <div class="item">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="">
                    </div>
                    <div class="item">
                        <label for="phone">Phone Number:</label>
                        <input type="number" id="phone" name="phone" value="">
                    </div>
                    <div class="item">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="male" selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="item">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" value="">
                    </div>
                    <div class="item">
                        <label for="image">Select Image:</label>
                        <input type="file" id="image" name="image" onchange="displayImage(this)">
                    </div>
                    </div>

                    <!-- Container for displaying uploaded image -->
                    <div id="imageContainer"></div>

                <!-- Buttons -->
                <div class="btn-container">
                    <button type="submit">Cancel</button>
                    <button type="button">Save</button>
                </div>
            </div>
        </div>
    </div>

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
