<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
require_once 'db_connection.php';
include('navbar.php'); 

?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance USA - Home</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>

        #map { 
            width: 98%;
            margin: 20px auto;
            min-height: 700px;
            height: 100%;
            
        }

        .popup-content img, .popup-content video {
            width: 200px; 
            height: auto;
        }
        .btn-outline-info{
            margin-top: 10px;
            background-color:rgb(46, 133, 146);
            color: white;
            width;  2px;
            border-radius: 15px;

        }
        .btn-outline-info:hover{
            background-color:rgb(46, 146, 74);
            color: white;
            width;  2px;
            border-radius: 15px;
            z-index: 2;
            s
        }
    </style>
    <!-- Theme CSS -->
    <?php
        include('getTheme.php')
    ?>
</head>
<body>
  
    
    
    <div id="map"></div>
    
    
    <script>
  // Initialize the map and set default view
var map = L.map('map').setView([37.0902, -95.7129], 4); // Centered on the U.S. with zoom level 4
 
// Add OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  
}).addTo(map);

// Define the bounding box for the United States (latitude/longitude limits)
var usaBounds = [
    [18.91, -179.14], // Southwest corner (covers Hawaii and the westernmost part of Alaska)
    [71.39, -66.93]   // Northeast corner (covers northern Alaska and Maine)
];
// Restrict the map view to the defined U.S. boundaries
map.setMaxBounds(usaBounds);
map.setMaxZoom(8);
map.setZoom(4);
map.setMinZoom(4);

// Prevent users from panning outside the boundaries
map.on('drag', function() {
    map.panInsideBounds(usaBounds, { animate: false });
   
    
});
/**********************************************************************************************************
 * Function to fetch coordinates from city name using Nominatim API with caching                         *
 **********************************************************************************************************/
async function getCoordinates(city) {
    let cacheKey = `coords_${city}`;
    let cachedData = localStorage.getItem(cacheKey);
    if (cachedData) {
        return JSON.parse(cachedData);
    }

    let url = `https://nominatim.openstreetmap.org/search?format=json&q=${city}`;

    /**********************************************************************************************************
     * The fetch() method is used to request a resource from the network.                                     *       
     * It returns a promise that resolves to the Response to that request, whether it is successful or not.   *           
     * You can also opt to return the data in JSON format by calling the json() method on the response.       *
     * The then() method is used to execute a function after the promise is resolved (or rejected).           *       
     * The function receives the response from the fetch request.                                             *           
     * The catch() method is used to handle any errors that may have occurred during the fetch request.       *   
     ***********************************************************************************************************/

    return new Promise((resolve, reject) => {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    let coords = [parseFloat(data[0].lat), parseFloat(data[0].lon)];
                    localStorage.setItem(cacheKey, JSON.stringify(coords)); // Cache the result
                    resolve(coords);
                } else {
                    console.warn(`No coordinates found for: ${city}`);
                    resolve(null);
                }
            })
            .catch(error => {
                console.error("Error fetching coordinates:", error);
                resolve(null);
            });
    });
    
}

/************************************************************************************************************
 * The fetch() method is used to request a resource from the network.                                       *
 * It returns a promise that resolves to the Response to that request, whether it is successful or not.     * 
 * You can also opt to return the data in JSON format by calling the json() method on the response.         *
 * The then() method is used to execute a function after the promise is resolved (or rejected).             *       
 * The function receives the response from the fetch request.                                               *             
 * The catch() method is used to handle any errors that may have occurred during the fetch request.         *
 ************************************************************************************************************/

        fetch("get_markers.php")
            .then(response => response.json())
            .then(async data => {
                for (const marker of data) {
                let coords = await getCoordinates(marker.city);
                     if (coords) {
                        let popupContent = `<div class="card" style="width: 18rem;">
        ${marker.type === "video" ?
            (marker.media.includes("youtube.com") || marker.media.includes("youtu.be") ?
                `<iframe width="100%" height="215" src="https://www.youtube.com/embed/${getYouTubeID(marker.media)}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>` :
                `<video class="card-img-top" controls><source src="${marker.media}" type="video/mp4"></video>`
            ) :
            `<img class="card-img-top" src="${marker.media}" alt="Dance Image">`
        }
        <div class="card-body">
            <h5 class="card-title">${marker.genre}</h5>
            <p class="card-text">${marker.city}</p>
            <p class="card-text">${marker.description}</p>
            <a href="dance_view.php?video_id=${marker.id}">
                <button type="button">View Dance</button>
            </a>
         </div>
    </div>`;
    function getYouTubeID(url) {
        let match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/))([\w-]{11})/);
        return match ? match[1] : null;
            }
      L.marker(coords).addTo(map).bindPopup(popupContent);
                    } else {
                        console.error("Could not find coordinates for:", marker.city);
                    }
                }
            })
            .catch(error => console.error("Error loading markers:", error));

    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php
    include('footer.php');
    ?>
</html>
