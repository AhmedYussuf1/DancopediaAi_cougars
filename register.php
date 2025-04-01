<?php
session_start();

include('db_connection.php');  // Include your database connection

// Handle POST request for registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape input values to prevent SQL Injection
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = trim($_POST['password']);
    $email = $conn->real_escape_string(trim($_POST['email']));
    $full_name = $conn->real_escape_string(trim($_POST['full_name']));

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Username already exists
        $_SESSION['message'] = "Username already taken. Please choose another.";
        header("Location: register.php");
        exit();
    }
    $stmt->close();

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Email already exists
        $_SESSION['message'] = "Email already in use. Please choose another.";
        header("Location: register.php");
        exit();
    }
    $stmt->close();

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, email, full_name, role) VALUES (?, ?, ?, ?, 'user')");
    $stmt->bind_param("ssss", $username, $password_hash, $email, $full_name);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful! Please log in.";

        // Create connection again (or reuse the same connection)
        $user_id = getUserIdByName($username, $conn);

        // Check if user_id was successfully fetched
        if ($user_id) {
            // Call the function to insert user settings
            if (insertUserSettings($user_id, $conn)) {
                echo "User settings added successfully!";
            } else {
                echo "Failed to add user settings.";
            }
        } else {
            echo "Failed to fetch user_id.";
        }

        header("Location: login.php");
        exit();
    } else {
        $_SESSION['message'] = "An error occurred. Please try again.";
        header("Location: register.php");
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Function to fetch user_id based on user's name
function getUserIdByName($username, $conn) {
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    if ($stmt->execute() === false) {
        error_log('execute() failed: ' . htmlspecialchars($stmt->error));
        return false;
    }
    $stmt->bind_result($user_id);
    if ($stmt->fetch() === false) {
        error_log('fetch() failed: ' . htmlspecialchars($stmt->error));
        return false;
    }
    $stmt->close();
    return $user_id;
}

// Insert new entry into user_settings table
function insertUserSettings($user_id, $conn) {
    $theme = 2;
    $email_blog = 0; // false
    $email_events = 0; // false
    $email_dance = 0; // false
    $language = "English";

    $stmt = $conn->prepare("INSERT INTO user_settings (user_id, theme, email_blog, email_events, email_dance, language) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiis", $user_id, $theme, $email_blog, $email_events, $email_dance, $language);
    if ($stmt->execute() === false) {
        error_log('execute() failed: ' . htmlspecialchars($stmt->error));
        return false;
    }
    $stmt->close();
    return true;
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dance USA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Include the navbar -->
<?php include('navbar.php'); ?>

<div class="container">
    <h2 class="my-5 text-center">Register</h2>

    <!-- Display error message if there is one -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <!-- Registration form -->
    <form method="POST" action="register.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
