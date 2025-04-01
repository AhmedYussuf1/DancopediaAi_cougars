<?php
session_start();
// Include the navbar (which already contains session_start())
include('navbar.php');
// Database connection
include('db_connection.php');
require_once('utility_functions/display_result.php');
 // Query to get  from dance table with genre name Classical
 $sql = "SELECT * FROM `dances` WHERE  genre='Classical'  ";  // Ensure this matches your table and column names
 $result = $conn->query($sql);
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American Classical Dances</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- exacted css style for folk_dance.php -->
    <link rel="stylesheet" href="css/folk_dance.css">
    <?php include('getTheme.php');?>
     
   
</head>
<body>

   
    <!-- //display the dance data in a card format -->
    <div class="container main-content">
        <header class="text-center my-5">
            <h1 class="display-3">American Classical Dances</h1>
            <p class="lead">Discover the unique and vibrant classical dance traditions from across the United States.</p>
        </header>
        <div class="row">
        <?php
        // Display the dance cards
        displayDanceCard($result,"");
 
            $conn->close();
            ?>
        </div>
    </div>          
  <?php
    include('footer.php');
    ?>
         

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>