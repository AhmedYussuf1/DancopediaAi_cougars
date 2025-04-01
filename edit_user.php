<?php
session_start();
include('db_connection.php');  // Include your database connection

// Ensure that the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");  // Redirect to login page if not logged in or not an admin
    exit();
}

// Get user ID from URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data from the database
    $userQuery = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
    if ($userQuery->num_rows > 0) {
        $user = $userQuery->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "No user ID provided.";
    exit();
}

// Check if the form is submitted to update the user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update user in the database
    $updateQuery = $conn->query("UPDATE users SET username = '$username', email = '$email', role = '$role' WHERE user_id = $user_id");
    
    if ($updateQuery) {
        echo "User updated successfully!";
        header("Location: admin_dashboard.php");  // Redirect after successful update
        exit();
    } else {
        echo "Failed to update user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <h1>Edit User</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control" id="role" required>
                    <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
