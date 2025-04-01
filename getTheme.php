<?php
function getTheme() {
    global $conn;  // Access the global $conn variable
    if (isset($_SESSION['username'])) {
        $user_id = $_SESSION['user_id'];
        $themeQuery = "SELECT theme FROM user_settings WHERE user_id = $user_id";
        $themeResult = $conn->query($themeQuery);
        if ($themeResult->num_rows > 0) {
            $row = $themeResult->fetch_assoc();
            return $row['theme'];
        } else {
            return 2;  // Default theme if no result found
        }
    } else {
        return 2;  // Default theme if user not logged in
    }
}
$setTheme = getTheme();
if($setTheme == 1) {
    echo '<link href="css/styleBright.css" rel="stylesheet">';
} elseif ($setTheme == 2) {
    echo '<link href="css/styleLight.css" rel="stylesheet">';
} elseif ($setTheme == 3) {
    echo '<link href="css/styleBlueFilter.css" rel="stylesheet">';
} elseif ($setTheme == 4) {
    echo '<link href="css/styleDark.css" rel="stylesheet">';
} elseif ($setTheme == 5) {
    echo '<link href="css/styleMidnight.css" rel="stylesheet">';
}
?>

