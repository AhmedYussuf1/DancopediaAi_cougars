<?php
session_start();

// Database connection
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // SQL query to delete the user from the users table
        $sql1 = "DELETE FROM users WHERE user_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $user_id);
        $stmt1->execute();

        // SQL query to delete the user from the user_settings table
        $sql2 = "DELETE FROM user_settings WHERE user_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $user_id);
        $stmt2->execute();

        // Commit transaction
        $conn->commit();
        echo "User and user settings deleted successfully.";
    } catch (Exception $e) {
        // Rollback transaction if any query fails
        $conn->rollback();
        echo "Error deleting user: " . $e->getMessage();
    }

    // Close the statements and connection
    $stmt1->close();
    $stmt2->close();
    $conn->close();
}
?>
