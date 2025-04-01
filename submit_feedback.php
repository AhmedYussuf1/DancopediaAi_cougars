<?php
// Start session to track user login status
session_start();

include('db_connection.php');  // Include your database connection

// Define the getTheme function
function getTheme() {
    global $conn;  // Access the global $conn variable
    if (isset($_SESSION['username'])) {
        $user_id = $_SESSION['user_id'];
        
        // Check if the user is an admin, force light theme
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            return 1;  // Admin always gets the light theme
        }

        // Get the user's saved theme if not an admin
        $themeQuery = "SELECT theme FROM user_settings WHERE user_id = $user_id";
        $themeResult = $conn->query($themeQuery);
        if ($themeResult->num_rows > 0) {
            $row = $themeResult->fetch_assoc();
            return $row['theme'];
        } else {
            return 1;  // Default theme if no result found
        }
    } else {
        return 1;  // Default theme if user not logged in
    }
}

// Initialize the success flag
$feedbackSubmitted = false;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Handle the image upload if present
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define the directory to store images
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $image = $targetFile; // Save the image path to the database
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // Prepare the SQL query to insert the feedback into the database
    $sql = "INSERT INTO feedback (name, email, message, image) 
            VALUES ('$name', '$email', '$message', '$image')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Set the feedback submitted flag to true
        $feedbackSubmitted = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch the theme after the form submission logic
$setTheme = getTheme();

// Close the database connection at the end of the script
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Navbar CSS -->
    <link rel="stylesheet" href="navbar.css"> <!-- Reference your navbar.css -->

    <?php
    if($setTheme == 1){
        echo ' <link href="css/styleLight.css" rel="stylesheet"> ';
    }
    elseif ($setTheme == 2){
        echo ' <link href="css/styleDark.css" rel="stylesheet"> ';
    }
    ?>
</head>
<body>
    <!-- Include the navbar -->
    <?php include 'navbar.php'; ?> <!-- Reference your navbar.php -->

    <!-- Success Message -->
    <?php if ($feedbackSubmitted): ?>
        <div class="alert alert-success text-center mt-4" role="alert">
            Feedback submitted successfully! Thank you for your input.
        </div>
    <?php endif; ?>

    <div class="container">
        <h1 class="text-center">Submit Your Feedback</h1>
        
        <div class="feedback-box">
            <!-- Feedback Form -->
            <form action="submit_feedback.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Feedback:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload an Image (optional):</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
