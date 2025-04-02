<?php 
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $video_url = $_POST['link']; // Changed variable name to video_url
    $genre = $_POST['genre'];
    $region = $_POST['region'];
    $description = $_POST['description'];  // Add description field as well

    // Prepare and bind the query
    $stmt = $conn->prepare("INSERT INTO dances (name, video_url, genre, region, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $video_url, $genre, $region, $description); // Insert into video_url column

    // Execute the query and check if successful
    if ($stmt->execute()) {
        $successMessage = "Dance added successfully!";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <!-- Add Dance Form -->
    <div class="container mt-5">
        <h1>Add New Dance</h1>

        <!-- Display success or error messages -->
        <?php if (isset($successMessage)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php } elseif (isset($errorMessage)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php } ?>

        <!-- Form to add a new dance -->
        <form action="add_dance.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Dance Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Dance URL</label> <!-- Changed label to Dance URL -->
                <input type="url" class="form-control" id="link" name="link" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="mb-3">
                <label for="region" class="form-label">Region</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Dance</button>
        </form>

        <!-- Back to Dashboard Button -->
        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
