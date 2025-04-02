<?php
// Start session
session_start();

// Include database connection
include('db_connection.php');

// Get the search query
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if (!empty($query)) {
    // Retrieve name and dance_id from the dances table in the database
    $sql = "SELECT name, dance_id FROM dances WHERE name LIKE '%$query%'";
} else {
    // Or else retrieve name from the dances table in the database
    $sql = "SELECT name link FROM dances";
}

$result = $conn->query($sql);

$searchResults = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}

// Return results in JSON format
echo json_encode($searchResults);

$conn->close();
?>


