<?php
session_start();
include('navbar.php');
// Database connection
include('db_connection.php');

function getVideoLink($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['video_id'])) {
        $videoId = $_GET['video_id'];
        $sql = "SELECT video_url FROM dances WHERE dance_id = $videoId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Extract YouTube video ID from URL
            $videoURL = $row["video_url"];
            preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/[^\n\s]+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoURL, $matches);
            $videoID = $matches[1]; // YouTube video ID
            return "https://www.youtube.com/embed/$videoID";
        }
        else{
            echo 'No video ID found.';
        }
    } else {
        echo 'No video ID provided.';
    }
}

function getDescription($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['video_id'])) {
        $videoId = $_GET['video_id'];
        $sql = "SELECT description FROM dances WHERE dance_id = $videoId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $description = $row["description"];
            return "$description";
        }
        else{
            echo 'No Video Found';
        }
    } else {
        echo 'No video ID provided.';
    }
}

function getRegion($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['video_id'])) {
        $videoId = $_GET['video_id'];
        $sql = "SELECT region FROM dances WHERE dance_id = $videoId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $region = $row["region"];
            return "Region: $region";
        }
        else{
            echo 'No Video Found';
        }
    } else {
        echo 'No video ID provided.';
    }
}

function getTitle($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['video_id'])) {
        $videoId = $_GET['video_id'];
        $sql = "SELECT name FROM dances WHERE dance_id = $videoId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["name"];
        }
        else{
            echo 'No Video Found';
        }
        // Fetch video details from the database using the $videoId
        // Display video and description
    } else {
        echo 'No Video Found';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing <?php echo getTitle($conn);?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include('getTheme.php');?>
</head>
<body>
<div class="container d-xxl-flex justify-content-xxl-center" style="height: 60vh; width: 80vw;"><iframe width="100%" height="100%" src="<?php echo getVideoLink($conn);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></iframe></div>
<div class="container d-xxl-flex justify-content-xxl-center"><h1>Description:</h1></div>
<div class="container d-xxl-flex justify-content-xxl-center"><h2><?php echo getDescription($conn);?></h2></div>
<div class="container d-xxl-flex justify-content-xxl-center"><h1><?php echo getRegion($conn);?></h1></div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
