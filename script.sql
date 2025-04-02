ahmed_yussuf
ahmed_yussuf
Online

Corey — 2/21/25, 2:37 PM
I grabbed the submit feedback but it looks like there is a difference on your feedback page so double checking that
JRasta — 2/21/25, 2:38 PM
Sounds good
Corey — 2/21/25, 2:39 PM
there wasnt any change
I think there was just an added line space
JRasta — 2/21/25, 2:39 PM
Anyone working on having content on the classical dance folk dance and contemporary dance pages
Corey — 2/21/25, 2:39 PM
so yeah your code should be in main I think
ahmed_yussuf — 2/21/25, 2:42 PM
not me
JRasta — 2/21/25, 2:43 PM
It would be nice if we added something to it
JRasta — 2/22/25, 1:05 PM
there was a dead link on the last one it was edit user i just fixed it
how is everyone doing any ideas on what we should put on the 3 blank pages?
JRasta — 2/22/25, 2:24 PM
working on the 3 pages just finished one
Corey — 2/22/25, 6:40 PM
what did you put on them? I was thinking like a group of a few dances that fit those themes and gave a bit of extra details on those specific dances.
JRasta — 2/22/25, 6:58 PM
I finished it I can show them to you tomorrow
JRasta — 2/23/25, 6:24 PM
Image
Image
Image
Tu — 2/23/25, 7:36 PM
nvm wasnt in the right directory needed to go into dancopedia file too 
Tu — 2/23/25, 7:55 PM
i might need help pulling
Image
went through but for some reason my files arent updated
ahmed_yussuf — 2/24/25, 10:22 AM
not related to the project. If you have not heard of google LLM for converting notes into spoken podcast like audio here is a link https://notebooklm.google/
Google NotebookLM | Note Taking & Research Assistant Powered by AI
Use the power of AI for quick summarization and note taking, NotebookLM is your powerful virtual research assistant rooted in information you can trust.
Google NotebookLM | Note Taking & Research Assistant Powered by AI
ahmed_yussuf — 2/25/25, 8:09 PM
Hey, Yaret, you did a good job updating those two pages. However, I would like you to put the update on GitHub so that I can test it and incorporate it into the other parts of the project.
JRasta — 2/26/25, 5:49 PM
Attachment file type: archive
Dancopedia AI done.zip
8.55 MB
i just published this on my hosting here is the updated site https://yareda11.sg-host.com/index.php let me know what is not working
JRasta — 2/26/25, 6:05 PM
we were first last week
Tu — 2/26/25, 6:06 PM
it seems to be working fine for me
great job
Corey — 2/26/25, 6:56 PM
@ahmed_yussuf https://stackoverflow.com/questions/60849055/how-do-i-only-show-one-county-with-leaflet-or-rebuild-this-map I think the professor was asking about only showing the u.s. if we only have information from the u.s.
Stack Overflow
How do I only show one county with Leaflet? Or rebuild this map?
I just started researching Leaflet but could not find out how to make sure that I only see one single county. The rest of it should not be there. Also place names, the country name and streets shou...
Image
JRasta — 2/26/25, 7:00 PM
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 22, 2025 at 09:56 PM
Expand
dance_ai_db (8).sql
23 KB
ahmed_yussuf — 2/26/25, 7:10 PM
Attachment file type: archive
Dancopedia_AI_cougars.zip
6.04 MB
<?php
header('Content-Type: application/json');

// Database connection settings
include('db_connection.php'); 
Expand
get_markers.php
1 KB
<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
require_once 'db_connection.php';
Expand
interactive_map.php
8 KB
<!-- Favicon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/navbar.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
Expand
navbar.php
6 KB
<!-- Favicon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/navbar.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
Expand
navbar.php
6 KB
<!-- Favicon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/navbar.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
Expand
navbar.php
6 KB
ahmed_yussuf — 2/26/25, 7:44 PM
Image
that is the updated look of the map
Attachment file type: archive
css.zip
4.47 KB
that is the css folder
ahmed_yussuf — 2/26/25, 7:54 PM
var usaBounds = [
    [24.52, -125.00], // Southwest corner
    [49.38, -66.93]   // Northeast corner
];
var usaBounds = [
    [18.91, -179.14], // Southwest corner (covers Hawaii and the westernmost part of Alaska)
    [71.39, -66.93]   // Northeast corner (covers northern Alaska and Maine)
];
Corey — 2/26/25, 8:21 PM
https://stackoverflow.com/questions/38126343/leaflet-how-to-increase-maxzoom
Stack Overflow
Leaflet how to increase maxZoom
I am using Leaflet in my application and I need to zoom more than 18 levels (19 or 20 will be enough I think). But when I zoom more than 18 levels, the map image disappears leaving only a grey plan...
Image
https://leafletjs.com/examples/zoom-levels/
Corey — 2/26/25, 8:30 PM
map.setMaxBounds(usaBounds);
map.setMaxZoom(8);
map.setZoom(4);
map.setMinZoom(4);
Corey — 2/26/25, 8:43 PM
<!-- Favicon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/navbar.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
Expand
navbar.php
6 KB
JRasta — 2/26/25, 8:49 PM
<?php   
// Start session to track user login status
session_start();

// Database connection
$servername = "localhost";
Expand
index.php
15 KB
JRasta — 2/26/25, 9:28 PM
<?php
session_start(); // Start the session

// Display the error message if it exists
if (isset($_SESSION['message'])) {
    $error_message = $_SESSION['message'];
Expand
error.php
2 KB
JRasta — 2/26/25, 11:00 PM
any luck
JRasta — 2/26/25, 11:51 PM
i got it to work, dances show up now
Corey — Today at 4:48 PM
@ahmed_yussuf you up for a quick code checkup before class?
ahmed_yussuf — Today at 6:01 PM
I am sorrry
I was busy
I am here
what is new
Corey — Today at 6:08 PM
New themes, added updating user settings, added ability for users to delete account from user settings screen
I did a pull request
so the user settings page should be fully working
sql table needs one change to work with the account deleting
I'll just show that when we are in the group work time
ahmed_yussuf — Today at 6:10 PM
okey thank you
I am going to see the pull request
Corey — Today at 6:11 PM
the sql is just a setting to make the user_settings table delete the entry when the users table deletes an entry
The pull request also has the updated interactive map page, but that interactive map page still has issues with the css(i think?) where you cant click the user dropdown on that page
wait nvm I dont think I have the updated interactive map page...
the videos were loading yesterday but not today .-.
so if you pull from my branch, then pull yours in then it should get your updated code with the working map
ahmed_yussuf — Today at 6:13 PM
I had updated the interactive_map.php today but we have conflict that needs to be resolved
Corey — Today at 6:14 PM
oh ok
what is the conflict?
oh right its the map page, ofcourse lol
oh it looks like my map page is wrong
ahmed_yussuf — Today at 6:15 PM
today I fixed the video player
we will review together after
Corey — Today at 6:16 PM
ok sounds good
Corey — Today at 6:46 PM
min-height: 700px;
height: 100%;
Tu — Today at 6:48 PM
<!-- Feedback Section -->
<h2>Feedback</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Feedback ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted On</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'db_connection.php';
        $feedback_result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY created_at DESC");

        while ($row = mysqli_fetch_assoc($feedback_result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="delete_feedback.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
﻿
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 22, 2025 at 09:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dance_ai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_interactions`
--

CREATE TABLE `chatbot_interactions` (
  `interaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `query` text DEFAULT NULL,
  `response` text DEFAULT NULL,
  `interaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot_interactions`
--

INSERT INTO `chatbot_interactions` (`interaction_id`, `user_id`, `query`, `response`, `interaction_timestamp`) VALUES
(1, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-01-31 09:56:19'),
(2, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-01-31 10:43:22'),
(3, NULL, 'hi can you tell me the capital of china', 'Sorry, I can only help with questions about dance in America.', '2025-01-31 11:41:21'),
(4, NULL, 'what kind of breakdancing does the usa have', 'In the USA, breakdancing is a popular form of dance that originated in the Bronx, New York City in the 1970s. It is known for its acrobatic moves, intricate footwork, and self-expression through movement. Breakdancing competitions and events, known as \"battles,\" are held in cities across the country, showcasing the skills and creativity of dancers in this dynamic style.', '2025-01-31 11:42:30'),
(5, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-03 07:18:03'),
(6, NULL, 'whats dance', 'Sorry, I can only help with questions about dance in America.', '2025-02-03 07:18:15'),
(7, NULL, 'what dance in america', 'There are various dance styles in America that have originated or evolved in the country. Some popular dance styles in America include jazz, tap dance, hip-hop, ballet, modern dance, and various cultural dances from different communities across the nation. Each style has its own unique history and significance in American dance culture.', '2025-02-03 07:18:27'),
(8, 1, 'dance', 'Sorry, I can only help with questions about dance in America.', '2025-02-04 07:39:31'),
(9, 1, 'then start', 'Sure, feel free to ask me anything related to dance in America!', '2025-02-04 07:39:46'),
(10, 3, 'tell me a little history about dances in america', 'Dance in America has a rich history that reflects the cultural diversity of the country. From Native American dances to the influence of European settlers, African rhythms, and Latin styles, American dance forms have continually evolved and blended over the centuries. In the early 20th century, American dance was greatly influenced by social dances like the Charleston and the Lindy Hop. The mid-20th century saw the rise of modern dance pioneers such as Martha Graham and Doris Humphrey, who pushed the boundaries of traditional ballet and paved the way for contemporary dance. In recent decades, hip-hop and street dance styles have become prominent in American popular culture, alongside more traditional forms like ballet and tap. The diversity of dance in America continues to thrive, with new forms', '2025-02-05 07:06:34'),
(11, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 06:40:19'),
(12, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 07:00:51'),
(13, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 07:40:54'),
(14, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 07:45:33'),
(15, NULL, 'then what dance', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 07:45:45'),
(16, NULL, 'when did dance in america start', 'Dance in America has a rich and diverse history that dates back to the indigenous peoples of North America who used dance as a form of expression, storytelling, and celebration. European settlers also brought their own dance traditions to America, which eventually merged with African dance styles through the African diaspora and slavery. This blending of cultural influences laid the foundation for the development of various dance forms in America. Sorry, I can only help with questions about dance in America.', '2025-02-06 07:46:06'),
(17, NULL, 'hi', 'Sorry, I couldn\'t process your request. Please try again.', '2025-02-06 21:42:51'),
(18, NULL, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-06 21:44:37'),
(19, NULL, 'hi', 'Sorry, I can only help with questions about dance in America. ', '2025-02-06 21:56:58'),
(20, NULL, 'dance is', 'Sorry, I can only help with questions about dance in America.', '2025-02-07 05:24:41'),
(21, NULL, 'whats dance in america like', 'Dance in America is incredibly diverse and vibrant, with a wide range of styles and influences. From traditional Native American dances to modern hip-hop, ballet, jazz, and contemporary dance, there is a rich tapestry of dance forms found throughout the country. American dance has been shaped by a variety of cultural traditions, immigration patterns, and historical influences, making it a dynamic and evolving art form.', '2025-02-08 14:34:50'),
(22, 3, 'hi', 'Sorry, I can only help with questions about dance in America. ', '2025-02-11 05:28:23'),
(23, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 07:20:53'),
(24, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 07:49:47'),
(25, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 07:56:56'),
(26, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 08:02:54'),
(27, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 08:13:14'),
(28, 3, 'whats dance in america like', 'Dance in America is incredibly diverse and vibrant, encompassing a wide range of styles and traditions. From ballet and modern dance to hip hop and jazz, American dance reflects the country\'s multicultural heritage and creative spirit. There are also indigenous dance forms, such as Native American dance, that showcase the rich cultural tapestry of the United States. Overall, dance in America is an important art form that continues to evolve and thrive in both traditional and contemporary settings.', '2025-02-11 08:47:08'),
(29, 3, 'hi', 'Sorry, I can only help with questions about dance in America.', '2025-02-11 08:58:30'),
(30, 14, 'hi', 'Sorry, I couldn\'t process your request. Please try again.', '2025-02-20 04:04:56'),
(31, 14, 'hi', 'Sorry, I couldn\'t process your request. Please try again.', '2025-02-20 04:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `dances`
--

CREATE TABLE `dances` (
  `dance_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dances`
--

INSERT INTO `dances` (`dance_id`, `name`, `description`, `region`, `image_url`, `video_url`, `created_at`, `updated_at`, `admin_id`, `genre`, `link`) VALUES
(14, 'Ballet Extravaganza', 'A classical ballet performance with live orchestra.', 'New York', 'images/ballet.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-05 23:53:59', '2025-02-20 00:03:15', 1, 'Classical', 'https://example.com/ballet'),
(15, 'Hip-Hop Madness', 'An exciting hip-hop battle featuring the best dancers!', 'Texas', 'images/hiphop.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-05 23:53:59', '2025-02-20 00:03:02', 1, 'Hip-Hop', 'https://example.com/hiphop'),
(16, 'Tango Delight', 'A romantic tango evening with passionate performances.', 'Florida', 'images/tango.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-05 23:53:59', '2025-02-20 00:02:56', 1, 'Ballroom', 'https://example.com/tango'),
(17, 'Contemporary Vibes', 'A fusion of modern contemporary dance styles.', 'California', 'images/contemporary.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-05 23:53:59', '2025-02-20 00:02:51', 1, 'Contemporary', 'https://example.com/contemporary'),
(18, 'Salsa Fiesta', 'A vibrant salsa night with amazing performances!', 'California', 'images/salsa.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-06 00:04:57', '2025-02-20 00:02:42', 1, 'Latin', 'https://example.com/salsa'),
(19, 'Ballet Extravaganza', 'A classical ballet performance with live orchestra.', 'New York', 'images/ballet.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-06 00:04:57', '2025-02-20 00:02:37', 1, 'Classical', 'https://example.com/ballet'),
(20, 'Hip-Hop Madness', 'An exciting hip-hop battle featuring the best dancers!', 'Texas', 'images/hiphop.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-06 00:04:57', '2025-02-20 00:02:28', 1, 'Hip-Hop', 'https://example.com/hiphop'),
(21, 'Tango Delight', 'A romantic tango evening with passionate performances.', 'Florida', 'images/tango.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-06 00:04:57', '2025-02-20 00:02:16', 1, 'Ballroom', 'https://example.com/tango'),
(22, 'Contemporary Vibes', 'A fusion of modern contemporary dance styles.', 'California', 'images/contemporary.jpg', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-06 00:04:57', '2025-02-20 00:02:09', 1, 'Contemporary', 'https://example.com/contemporary'),
(28, 'JARED', 'test', 'usa', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-11 06:22:59', '2025-02-11 06:22:59', 3, 'hiphop', ''),
(29, 'Dancopedia AI', 'test 700', 'usa', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-11 06:54:37', '2025-02-20 00:05:24', 3, 'hiphop', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx'),
(30, 'JARED', 'classical', 'cali', NULL, 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx', '2025-02-20 05:55:13', '2025-02-20 05:58:53', NULL, 'class', 'https://youtu.be/ctLyL5EWTFU?si=eaWsj2kLkduPR8nx'),
(31, 'c walk', 'west cost dance', 'usa', NULL, 'https://youtu.be/nIkfs6EC91U?si=n1NSERgjAUT6T31H', '2025-02-22 19:12:01', '2025-02-22 19:29:04', NULL, 'hip hop', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `image`, `created_at`) VALUES
(1, 'jame', 'yared1alemu@gmail.com', 'test', '', '2025-02-20 04:48:22'),
(2, 'jame', 'yared1alemu@gmail.com', 'test', '', '2025-02-20 04:51:15'),
(3, 'jame', 'yared1alemu@gmail.com', 'test1', '', '2025-02-20 04:54:07'),
(4, 'jame', 'yared1alemu@gmail.com', 'test2', '', '2025-02-20 04:55:31'),
(5, 'jame', 'yared1alemu@gmail.com', 'test4', '', '2025-02-20 04:55:51'),
(6, 'jame', 'yared1alemu@gmail.com', 'test5', '', '2025-02-20 04:58:27'),
(7, 'jame', 'yared1alemu@gmail.com', 'test5', '', '2025-02-20 05:00:07'),
(8, 'jame', 'yared1alemu@gmail.com', 'test7', '', '2025-02-20 05:00:24'),
(9, 'jame', 'yared1alemu@gmail.com', 'test700', '', '2025-02-20 05:37:45'),
(10, 'jame', 'yared1alemu@gmail.com', 'test800', '', '2025-02-20 05:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`) VALUES
(1, 'yared1alemu@gmail.com', '69b80aed88a62742da63ecac38f50fd9935b5c8b18370e9ad38c416a2c3e14829abf44167130450998e9196a3ca5a7df584b', 1738821757);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `dance_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `user_id`, `image_path`, `image`) VALUES
(1, 'test', 'test', '2025-02-04 11:57:17', NULL, NULL, NULL),
(2, 'test', 'test', '2025-02-04 11:57:58', NULL, NULL, NULL),
(3, 'test', 'test2', '2025-02-04 11:58:34', NULL, NULL, NULL),
(15, 'chat', 'Chatbot: Dance in America has a rich history that reflects the cultural diversity of the country. From Native American dances to the influence of European settlers, African rhythms, and Latin styles, American dance forms have continually evolved and blended over the centuries. In the early 20th century, American dance was greatly influenced by social dances like the Charleston and the Lindy Hop. The mid-20th century saw the rise of modern dance pioneers such as Martha Graham and Doris Humphrey, who pushed the boundaries of traditional ballet and paved the way for contemporary dance. In recent decades, hip-hop and street dance styles have become prominent in American popular culture, alongside more traditional forms like ballet and tap. The diversity of dance in America continues to thrive, with new forms\r\n\r\n', '2025-02-05 07:07:13', 3, NULL, NULL),
(19, 'picture', 'test', '2025-02-22 18:54:54', 3, NULL, 'american-flag-2144392_640.png');

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `search_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `search_query` varchar(255) DEFAULT NULL,
  `search_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`search_id`, `user_id`, `search_query`, `search_timestamp`) VALUES
(1, 1, 'what is breakdancing?', '2025-02-04 12:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `session_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `full_name`, `role`, `session_token`, `created_at`, `updated_at`) VALUES
(1, 'test', '$2y$10$Y0QKAhdmUqdLVQKUMemreuqN5Bx3vBo91coWENBaN5IsM2MIue5Ou', 'yared700alemu@gmail.com', 'test1', 'admin', NULL, '2025-02-04 11:05:34', '2025-02-11 04:32:57'),
(3, 'james', '$2y$10$yyXFFojafDAi/s2FsDTFae/6e2KamopWxQOSdC0nCxvWCXcAiB9JS', '1yared7alemu@gmail.com', 'james', 'admin', NULL, '2025-02-04 07:18:40', '2025-02-04 07:19:29'),
(10, 'admin', 'password_hash_example', 'admin@example.com', 'Admin User', 'admin', 'dummy_token', '2025-02-05 23:53:12', '2025-02-05 23:53:12'),
(14, 'john', '$2y$10$Q2T0W6xJ3Sm4KGCtNIXXQejp1qJFgJnNQLEMHsfbxFBiuylwSEN8i', 'johntest1234@yahoo.com', 'john', 'admin', NULL, '2025-02-11 04:34:24', '2025-02-22 19:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `user_id` int(11) NOT NULL,
  `theme` int(11) DEFAULT NULL,
  `email_blog` tinyint(1) DEFAULT NULL,
  `email_event` tinyint(1) DEFAULT NULL,
  `email_dance` tinyint(1) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`user_id`, `theme`, `email_blog`, `email_event`, `email_dance`, `language`) VALUES
(3, 2, 0, 0, 0, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `dance_id` int(11) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot_interactions`
--
ALTER TABLE `chatbot_interactions`
  ADD PRIMARY KEY (`interaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dances`
--
ALTER TABLE `dances`
  ADD PRIMARY KEY (`dance_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `dance_id` (`dance_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `dance_id` (`dance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot_interactions`
--
ALTER TABLE `chatbot_interactions`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dances`
--
ALTER TABLE `dances`
  MODIFY `dance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chatbot_interactions`
--
ALTER TABLE `chatbot_interactions`
  ADD CONSTRAINT `chatbot_interactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `dances`
--
ALTER TABLE `dances`
  ADD CONSTRAINT `dances_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`dance_id`) REFERENCES `dances` (`dance_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `search_history`
--
ALTER TABLE `search_history`
  ADD CONSTRAINT `search_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`dance_id`) REFERENCES `dances` (`dance_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
dance_ai_db (8).sql
23 KB