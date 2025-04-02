<?php
header('Content-Type: application/json');

// Database connection settings
include('db_connection.php'); 

// Query to fetch dance data
$sql = "SELECT name, description, region, image_url, video_url, link, genre, city FROM dances";
$result = $conn->query($sql);

$dances = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dances[] = [
            "city" => $row["city"],  // Use 'region' as the city
            "type" => !empty($row["video_url"]) ? "video" : "image",
            "media" => !empty($row["video_url"]) ? $row["video_url"] : $row["image_url"],
            "link" => $row["link"],
            "genre" => $row["genre"],
            "description" => $row["description"]
        ];
    }
}

// Close connection
$conn->close();

// Return JSON response
echo json_encode($dances);
?>
