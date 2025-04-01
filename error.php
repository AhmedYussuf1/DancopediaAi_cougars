<?php
session_start(); // Start the session

// Display the error message if it exists
if (isset($_SESSION['message'])) {
    $error_message = $_SESSION['message'];
    unset($_SESSION['message']); // Clear the message after displaying it
} else {
    $error_message = "An unknown error occurred.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Dance USA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
        include('getTheme.php')
    ?>
</head>
<body>

<!-- Include Navbar -->
<?php include('navbar.php'); ?>

<div class="container">
    <h2 class="my-5 text-center">Error</h2>

    <!-- Display error message -->
    <div class="alert alert-danger" role="alert">
        <?php echo $error_message; ?>
    </div>

    <!-- Forgot Password Link (Always Visible) -->
    <div class="mt-3 text-center">
        <a href="forgot_password.php" class="btn btn-link">Forgot Password?</a>
    </div>

    <!-- Back to Login Button -->
    <div class="mt-3 text-center">
        <a href="login.php" class="btn btn-secondary">Back to Login</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
