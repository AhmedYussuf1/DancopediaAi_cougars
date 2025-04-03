<?php
session_start();
// Include the navbar (which already contains session_start())
include('navbar.php');
// Database connection
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American Contemporary Dances</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
        include('getTheme.php')
    ?>
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
        }

        .main-content {
            margin-top: 30px;
        }

        .dance-card {
            border: 1px;
            border-radius: 8px;
            overflow: hidden;
        }

        .dance-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .dance-card-body {
            padding: 20px;
        }

        .dance-card-body h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- American Contemporary Dances Content -->
    <div class="container main-content">
        <header class="text-center my-5">
            <h1 class="display-3">American Contemporary Dances</h1>
            <p class="lead">Discover the diverse world of American contemporary dance forms that continue to evolve.</p>
        </header>

        <div class="row">
            <!-- Modern Dance -->
            <div class="col-md-4 d-flex">
                <div class="card dance-card">
                    <img src="images/contemporary/modern_dance.jpg" alt="Modern Dance">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Modern Dance</h5>
                        <p class="card-text lg-4">
                            Modern dance is a broad dance genre that emerged in the early 20th century as a response to the rigidity of ballet. It focuses on creativity, self-expression, and often uses unconventional movements.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Hip Hop Dance -->
            <div class="col-md-4 d-flex">
                <div class="card dance-card">
                    <img src="images/contemporary/hip_hop_dance.jpg" alt="Hip Hop Dance">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Hip Hop Dance</h5>
                        <p class="card-text lg-4">
                            Hip hop dance includes a variety of styles such as breakdancing, popping, and locking. It developed alongside hip hop music in the 1970s in New York City and has become a worldwide cultural phenomenon.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Jazz Dance -->
            <div class="col-md-4 d-flex">
                <div class="card dance-card">
                    <img src="images/contemporary/jazz_dance.jpg" alt="Jazz Dance">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Jazz Dance</h5>
                        <p class="card-text lg-4">
                            Jazz dance is known for its energetic movements, improvisation, and theatrical style. It developed alongside jazz music and is often used in musical theater, contemporary performances, and pop culture.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 d-flex">
            <!-- Contemporary Ballet -->
            <div class="col-md-4">
                <div class="card dance-card">
                    <img src="images/contemporary/contemporary_ballet.jpg" alt="Contemporary Ballet">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Contemporary Ballet</h5>
                        <p class="card-text">
                            Contemporary ballet blends traditional ballet techniques with modern movements. It emphasizes creativity, flexibility, and collaboration with other art forms, often incorporating contemporary music.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tap Dance -->
            <div class="col-md-4 d-flex">
                <div class="card dance-card">
                    <img src="images/contemporary/tap_dance.jpg" alt="Tap Dance">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Tap Dance</h5>
                        <p class="card-text">
                            Tap dance is characterized by rhythmic tapping of the feet, creating a musical rhythm. It evolved in the early 20th century, influenced by African American dance styles and European step dancing.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Lyrical Dance -->
            <div class="col-md-4 d-flex">
                <div class="card dance-card">
                    <img src="images/contemporary/lyrical_dance.jpg" alt="Lyrical Dance">
                    <div class="card-body dance-card-body">
                        <h5 class="card-title">Lyrical Dance</h5>
                        <p class="card-text">
                            Lyrical dance is a fusion of ballet and jazz, with an emphasis on emotional expression. Dancers perform fluid and graceful movements to music with meaningful lyrics.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>