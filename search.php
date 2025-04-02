<?php
// Start session
session_start();

// Include database connection
include('db_connection.php');

// Get the search query
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if (!empty($query)) {
    // Match any record where * contains the query letters or numbers
    $sql = "SELECT name, dance_id FROM dances WHERE name LIKE '%$query%'";
} else {
    // Optional: Fetch all records if no query is provided
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

