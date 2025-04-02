<?php  
// Start session if not already started
if (!isset($_SESSION)) {
    session_start();  // Ensures that a session is started, if not already active.
}

// Set your OpenAI API key here
define('OPENAI_API_KEY', 'sk-proj-');  // Replace with your actual OpenAI API key

// Database connection
include('db_connection.php');

// Default Video URLs for specific genres
define('DEFAULT_SALSA_VIDEO_URL', 'https://youtu.be/vwGp16NXgQU?si=l8Iv3scmhUbsCGpb');  // Salsa Default URL
define('DEFAULT_HIP_HOP_VIDEO_URL', 'https://youtu.be/YeNWNUfM-rk?si=2QIQb7GsEvpeitCV');  // Hip Hop Default URL
define('DEFAULT_JAZZ_VIDEO_URL', 'https://youtu.be/-cZWHOIF73c?si=_9VCchgHuSJscNPI');  // Jazz Default URL

// Function to send request to OpenAI API and get chatbot's response
function getChatbotResponse($userMessage) {
    $messages = [
        [
            "role" => "system",
            "content" => "You are a dance expert who can describe various dance styles, their history, and cultural significance. Always respond in the following format: {\"name\": \"Dance Name\", \"genre\": \"Dance Genre\", \"region\": \"Dance Region\", \"description\": \"Dance Description\", \"video_url\": \"Video URL\"}. If the user asks about any other topics, respond by saying: 'Sorry, I can only help with questions about dance in America.'"
        ],
        [
            "role" => "user",
            "content" => $userMessage
        ]
    ];

    $data = [
        'model' => 'gpt-3.5-turbo',  
        'messages' => $messages,  
        'max_tokens' => 150  
    ];

    $ch = curl_init();  

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');  

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

    curl_setopt($ch, CURLOPT_POST, true);  

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  

    curl_setopt($ch, CURLOPT_HTTPHEADER, [  
        'Content-Type: application/json',  
        'Authorization: Bearer ' . OPENAI_API_KEY  
    ]);

    $response = curl_exec($ch);  
    if ($response === false) {
        echo "Error: " . curl_error($ch);  
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);

    if (isset($decodedResponse['choices'][0]['message']['content'])) {
        return $decodedResponse['choices'][0]['message']['content'];
    } else {
        return "Sorry, I couldn't process your request. Please try again.";  
    }
}

// Function to extract dance data from chatbot's response
function extractDanceData($responseMessage) {
    $danceData = json_decode($responseMessage, true);
    
    // Ensure we always use the appropriate default video URL based on the genre
    if (isset($danceData['name']) && isset($danceData['genre']) && isset($danceData['region']) && isset($danceData['description'])) {
        // Set the video URL based on genre
        switch (strtolower($danceData['genre'])) {
            case 'salsa':
                $danceData['video_url'] = DEFAULT_SALSA_VIDEO_URL;  // Salsa default URL
                break;
            case 'hip hop':
                $danceData['video_url'] = DEFAULT_HIP_HOP_VIDEO_URL;  // Hip Hop default URL
                break;
            case 'jazz':
                $danceData['video_url'] = DEFAULT_JAZZ_VIDEO_URL;  // Jazz default URL
                break;
            default:
                // If the genre is not one of the above, use a generic default URL
                $danceData['video_url'] = DEFAULT_SALSA_VIDEO_URL;  // Can use any default for non-specified genres
                break;
        }

        return $danceData;
    } else {
        return false;
    }
}

// Check if the user input exists in the POST request (i.e., the message from the user)
if (isset($_POST['input'])) {
    $userMessage = $_POST['input'];  

    // Check if the user wants to add data to the database
    if (strtolower($userMessage) === "add it to db") {
        // Only proceed if there's valid dance data in the session and user is admin
        if (isset($_SESSION['danceData']) && $_SESSION['role'] == 'admin') {
            $danceData = $_SESSION['danceData']; 

            // Prepare and execute the SQL query to insert the dance data into the database
            $stmt = $conn->prepare("INSERT INTO dances (name, genre, region, description, video_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $danceData['name'], $danceData['genre'], $danceData['region'], $danceData['description'], $danceData['video_url']);

            if ($stmt->execute()) {
                echo "Dance data added to the database!<br>";
                unset($_SESSION['danceData']);  // Clear session data after adding to the database
            } else {
                echo "Error: " . $stmt->error . "<br>";  // Debugging error message
            }

            $stmt->close();
        } else {
            echo "You must be an admin to add dance data or no dance data available.<br>";  // Debugging message
        }
    } else {
        // If the user message is not "add it to db", send it to the chatbot
        $responseMessage = getChatbotResponse($userMessage);  
        $danceData = extractDanceData($responseMessage);

        if ($danceData) {
            $_SESSION['danceData'] = $danceData;
            echo "Dance data received and stored in session.<br>";  // Debugging message
        } else {
            echo "Sorry, the chatbot did not provide valid dance data.<br>";  // Debugging message
        }
    }
}

$conn->close();
?>

<?php if (isset($_SESSION['danceData'])): ?>
    <h3>Dance Data Preview</h3>
    <p>Name: <?php echo $_SESSION['danceData']['name']; ?></p>
    <p>Genre: <?php echo $_SESSION['danceData']['genre']; ?></p>
    <p>Region: <?php echo $_SESSION['danceData']['region']; ?></p>
    <p>Description: <?php echo $_SESSION['danceData']['description']; ?></p>
    <p>Video URL: <?php echo $_SESSION['danceData']['video_url']; ?></p>
<?php endif; ?>