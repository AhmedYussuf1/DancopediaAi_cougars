<?php
function displayDanceCard($result,$defaultVideoURL) {
    // Check if $result is a valid result set
    // Fetch dance videos from the database
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Get the video URL, or set to default if empty
            $videoURL = !empty($row['video_url']) ? $row['video_url'] : $defaultVideoURL;
            $videoName = $row['name']; // Video name
            $videoGenre = $row['genre']; // Genre
            $videoRegion = $row['region']; // Region
            $videoDescription = $row['description']; // Dance description
            $videoNum = $row['dance_id'];

            // Extract YouTube video ID from URL
            preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/[^\n\s]+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoURL, $matches);
            $videoID = $matches[1]; // YouTube video ID

            echo '<div class="col-md-4 mb-4 video-item" data-name="' . strtolower($videoName) . '" data-genre="' . strtolower($videoGenre) . '" data-region="' . strtolower($videoRegion) . '">';
            echo '    <div class="card">';
            echo '        <iframe width="100%" height="215" src="https://www.youtube.com/embed/' . $videoID . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            echo '        <div class="card-body">';
            echo '            <h5 class="card-title">' . $videoName . '</h5>';
            echo '            <p class="card-text">Genre: ' . $videoGenre . '</p>';
            echo '            <p class="card-text">Region: ' . $videoRegion . '</p>';
            echo '            <p class="card-text"><strong>Description:</strong> ' . $videoDescription . '</p>'; // Added Description
            echo '            <a href="dance_view.php?video_id=' . $videoNum . '"><button type="button">View Dance</button></a>'; // Added id for dynamic dance page
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo "<p>No videos available.</p>";
    }
}
?>
