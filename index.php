<?php  
// Start session to track user login status
session_start();
//Navbar
include('navbar.php');
// Database connection
include('db_connection.php');

// Query to get dance data
$sql = "SELECT * FROM dances";  // Ensure this matches your table and column names
$result = $conn->query($sql);
?>

<!-- Add Favicon -->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance USA - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php
        include('getTheme.php')
    ?>
</head>
<body>

    <!-- Home Page Content -->
    <div class="main-content">
        <header class="text-center my-5">
            <div class="container">
                <h1 class="display-3">Welcome to the United States of Dances</h1>
                <p class="lead">Explore the history, styles, and cultural significance of U.S. dance forms.</p>
            </div>
        </header>

        <div class="container text-center my-5">
            <div class="row">
                <div class="col-md-4 image-container">
                    <img src="images/image1.jpg" alt="Dance Image 1" class="img-fluid">
                </div>
                <div class="col-md-4 image-container">
                    <img src="images/image2.jpg" alt="Dance Image 2" class="img-fluid">
                </div>
                <div class="col-md-4 image-container">
                    <img src="images/image3.jpg" alt="Dance Image 3" class="img-fluid">
                </div>
            </div>
        </div>

        <section class="about-section">
            <div class="container">
                <h2>About Dance USA</h2>
                <p>Dance USA is dedicated to showcasing the rich and diverse dance cultures of the world. We provide insights, history, and visual representations of various dance forms from every corner of the globe. Whether you're a dance enthusiast or someone looking to explore new styles, Dance USA brings the world of movement to your fingertips.</p>
            </div>
        </section>
    </div>

    <!-- Dance Videos Section -->
    <div class="container my-5">
        <h2 class="text-center">Dance Videos</h2>

        <!-- Filters Section -->
        <div class="d-flex justify-content-between mb-3">
            <input type="text" id="search-name" class="form-control w-25" placeholder="Search by Name" onkeyup="filterDances()">
            <input type="text" id="search-genre" class="form-control w-25" placeholder="Search by Genre" onkeyup="filterDances()">
            <input type="text" id="search-region" class="form-control w-25" placeholder="Search by Region" onkeyup="filterDances()">
        </div>

        <!-- Video Gallery -->
        <div class="row">
            <?php
            // Default video URL if none is provided
            $defaultVideoURL = 'https://youtu.be/vwGp16NXgQU?si=l8Iv3scmhUbsCGpb'; // Your provided default video URL

            // Fetch dance videos from the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Get the video URL, or set to default if empty
                    $videoURL = !empty($row['video_url']) ? $row['video_url'] : $defaultVideoURL;
                    $videoName = $row['name']; // Video name
                    $videoGenre = $row['genre']; // Genre
                    $videoRegion = $row['region']; // Region
                    $videoDescription = $row['description']; // Dance description

                    // Extract YouTube video ID from URL
                    preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/[^\n\s]+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoURL, $matches);
                    $videoID = $matches[1]; // YouTube video ID

                    echo '<div class="col-md-4 mb-4">';
                    echo '    <div class="card">';
                    echo '        <iframe width="100%" height="215" src="https://www.youtube.com/embed/' . $videoID . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title">' . $videoName . '</h5>';
                    echo '            <p class="card-text">Genre: ' . $videoGenre . '</p>';
                    echo '            <p class="card-text">Region: ' . $videoRegion . '</p>';
                    echo '            <p class="card-text"><strong>Description:</strong> ' . $videoDescription . '</p>'; // Added Description
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No videos available.</p>";
            }
            ?>
        </div>
    </div>

    <!-- CHAT BOX -->
    <div class="chat-box-container">
        <button class="open-button" onclick="openChatBox()">Chat <i class="fa-regular fa-comment"></i></button>
        <div class="chat-popup" id="myForm">
            <form id="chat-form" class="form-container">
                <div class="d-flex justify-content-between">
                    <h2>Chat</h2>
                    <h2><i class="fa-regular fa-comments"></i></h2>
                </div>

                <div class="chat-messages" id="chat-messages"></div>

                <label id="message-input" for="msg"><b>Message</b></label>
                <textarea placeholder="Type your message..." name="input" class="chatbox-text-area" required></textarea>

                <button id="chat-submit" type="submit" class="send_button">Send <i class="fa-regular fa-paper-plane"></i></button>
                <button type="button" class="send_button cancel" onclick="closeChatBox()">Close <i class="fa-regular fa-rectangle-xmark"></i></button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Open the Chatbox
        function openChatBox() {
            document.getElementById('myForm').style.display = 'block';
        }

        // Close the Chatbox
        function closeChatBox() {
            document.getElementById('myForm').style.display = 'none';
        }

        // Send message to backend and receive response
        $("#chat-form").submit(function(event) {
            event.preventDefault();
            const userMessage = $("textarea[name='input']").val().trim();
            if (userMessage) {
                $('#chat-messages').append('<p><strong>You:</strong> ' + userMessage + '</p>');
                $.ajax({
                    type: 'POST',
                    url: 'chatbot_backend.php',  // Path to your PHP backend file
                    data: { input: userMessage },
                    success: function(response) {
                        $('#chat-messages').append('<p><strong>Chatbot:</strong> ' + response + '</p>');
                        $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
                        $("textarea[name='input']").val(''); 
                    },
                    error: function() {
                        $('#chat-messages').append('<p><strong>Chatbot:</strong> Sorry, something went wrong.</p>');
                    }
                });
            } else {
                alert('Please type a message!');
            }
        });

        // Search function
        /*function searchDances() {
            let query = document.getElementById('search-bar').value;
            if (query) {
                $.ajax({
                    type: 'GET',
                    url: 'search.php',  // Create this PHP file to fetch filtered data
                    data: { search: query },
                    success: function(response) {
                        $('#dance-list').html(response);  // Update the dance table
                    },
                    error: function() {
                        alert('Error occurred while searching');
                    }
                });
            } else {
                alert('Please enter a search query.');
            }
        }*/
    </script>

</body>
</html>

<?php
$conn->close();
?>