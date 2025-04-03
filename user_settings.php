<?php
session_start(); // Start the session to track user login status

// Database connection
include('db_connection.php');

// Fetch the user settings
$user_id = $_SESSION['user_id'];
$sql = "SELECT theme, email_blog, email_events, email_dance FROM user_settings WHERE user_id = $user_id";
$result = $conn->query($sql);

$checkbox_states = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $theme = $row['theme'];
    $checkbox_states['BlogCheck'] = $row['email_blog'];
    $checkbox_states['EventsCheck'] = $row['email_events'];
    $checkbox_states['DanceCheck'] = $row['email_dance'];
}

function isChecked($id, $checkbox_states) {
    return isset($checkbox_states[$id]) && $checkbox_states[$id] ? 'checked' : '';
}

function isSelected($option, $theme) {
    return $option == $theme ? 'selected' : '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $delaccount = isset($_POST['delAccountInput']) ? 1 : 0;

    if($delaccount){
        // Query to delete user account
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);


        // Execute the query and check if successful
        if ($stmt->execute()) {
            session_destroy();
            header("Location: index.php");
            exit();
            //Send to Home Page
        } else {
            $deleteErrorMessage = "Error: Occured deleting account";
        }
        $stmt->close();
    }
    else {
        // Get form data
        $themeselect = $_POST['themeselect'];
        $blogcheck = isset($_POST['BlogCheck']) ? 1 : 0;
        $eventcheck = isset($_POST['EventCheck']) ? 1 : 0;
        $dancecheck = isset($_POST['DanceCheck']) ? 1 : 0;
        $newpassword = $_POST['User_New_Password'];
        $oldpassword = $_POST['User_Old_Password'];

        // Define the update query parts array for user_settings
        $update_parts = [];

        // Add theme to update query if changed
        if ($themeselect != $theme) {
            $update_parts[] = "theme = ?";
            $params[] = $themeselect;
            $types[] = 's';
        }

        // Add Blog Check to update query if changed
        if ($blogcheck != $checkbox_states['BlogCheck']) {
            $update_parts[] = "email_blog = ?";
            $params[] = $blogcheck;
            $types[] = 'i';
        }

        // Add Events Check to update query if changed
        if ($eventcheck != $checkbox_states['EventsCheck']) {
            $update_parts[] = "email_events = ?";
            $params[] = $eventcheck;
            $types[] = 'i';
        }

        // Add Dance Check to update query if changed
        if ($dancecheck != $checkbox_states['DanceCheck']) {
            $update_parts[] = "email_dance = ?";
            $params[] = $dancecheck;
            $types[] = 'i';
        }

        // Combine all update parts into the final query for user_settings
        if (!empty($update_parts)) {
            $query = "UPDATE user_settings SET " . implode(", ", $update_parts) . " WHERE user_id = ?";
            $params[] = $user_id;
            $types[] = 'i';

            // Prepare and bind the query
            $stmt = $conn->prepare($query);
            $stmt->bind_param(implode("", $types), ...$params);

            // Execute the query and check if successful
            if ($stmt->execute()) {
                $successMessage = "User Settings Updated!";
            } else {
                $errorMessage = "Error: Occured";
            }

            // Update local variables with new values
            $theme = $themeselect;
            $checkbox_states['BlogCheck'] = $blogcheck;
            $checkbox_states['EventsCheck'] = $eventcheck;
            $checkbox_states['DanceCheck'] = $dancecheck;
        }

        // Check if the new password is provided
        if (!empty($newpassword)) {
            if ($newpassword != $oldpassword) {
                // Query to get the old password from the database
                $stmt = $conn->prepare("SELECT password_hash FROM users WHERE user_id = ?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->bind_result($db_old_password);
                $stmt->fetch();
                $stmt->close();

                if (password_verify($oldpassword, $db_old_password)) {
                    // Update the new password in the users table
                    $hashed_new_password = password_hash($newpassword, PASSWORD_BCRYPT);
                    $stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE user_id = ?");
                    $stmt->bind_param("si", $hashed_new_password, $user_id);

                    // Execute the query and check if successful
                    if ($stmt->execute()) {
                        $passwordSuccessMessage = "Updated Password";
                    } else {
                        $passwordErrorMessage = "Error: Occured updating password";
                    }
                } else {
                    $passwordErrorMessage = "Old Password Incorrect";
                }
            } else {
                $passwordErrorMessage = "New password cannot be old password";
            }
        }
    }
}



// Include the navbar (which already contains session_start())
include('navbar.php');
?>

<!-- Add Favicon -->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance USA - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php
        include('getTheme.php')
    ?>
</head>

<body>
<?php
if(isset($_POST['account_delete_button'])) {
    $user_id = $_SESSION['user_id'];
    echo '<script> console.log("Tried to Delete USer"); </script>';
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = $user_id");
    $stmt->execute();
}
?>
<div class="modal fade" role="dialog" id="modal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Account Delete</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Confirm Account Delete</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST">
                    <button class="btn btn-danger" type="submit" id="confirmDelete">Delete</button>
                    <input name="delAccountInput" id="delAccountInput" type="hidden" value="1">
                </form>

            </div>
        </div>
    </div>
</div>
<div class="container mt-4 mb-4">
    <h1>User Settings</h1>
</div>
<form action="user_settings.php" method="POST">
    <!-- Display success or error messages -->
    <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php } elseif (isset($errorMessage)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>
    <div class="container mt-4 mb-4">
        <h2 style="text-shadow: 1px 1px;">Website Theme Preference</h2>
        <select class="form-select" style="width: 200px;" name="themeselect">
            <optgroup label="Themes" id="themeselect">
                <option value="1" <?php echo isSelected(1, $theme); ?>>Bright</option>
                <option value="2" <?php echo isSelected(2, $theme); ?>>Light</option>
                <option value="3" <?php echo isSelected(3, $theme); ?>>BlueFilter</option>
                <option value="4" <?php echo isSelected(4, $theme); ?>>Dark</option>
                <option value="5" <?php echo isSelected(5, $theme); ?>>Midnight</option>
            </optgroup>
        </select>
    </div>
    <div class="container mt-4 mb-4">
        <h2 style="text-shadow: 1px 1px;">Email Preferences</h2>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="BlogCheck" name="BlogCheck" value="1" <?php echo isChecked('BlogCheck', $checkbox_states); ?>><label class="form-check-label" for="BlogCheck">Blog Posts</label></div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="EventCheck" name="EventCheck" value="1" <?php echo isChecked('EventsCheck', $checkbox_states); ?>><label class="form-check-label" for="EventsCheck">Events</label></div>
        <div class="form-check"><input class="form-check-input" type="checkbox" id="DanceCheck" name="DanceCheck" value="1" <?php echo isChecked('DanceCheck', $checkbox_states); ?>><label class="form-check-label" for="DanceCheck">New Dances</label></div>
    </div>
    <div class="container mt-4 mb-4">
        <h2 style="text-shadow: 1px 1px;">Account Settings</h2>
        <div><input class="form-control mb-2" type="password" id="User_New_Password" name="User_New_Password" placeholder="New Password" style="width: 200px;"></div>
        <div><input class="form-control" type="password" id="User_Old_Password" name="User_Old_Password" placeholder="Old Password" style="width: 200px;"></div>
        <!-- Display success or error messages -->
        <?php if (isset($passwordSuccessMessage)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $passwordSuccessMessage; ?>
            </div>
        <?php } elseif (isset($passwordErrorMessage)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $passwordErrorMessage; ?>
            </div>
        <?php } ?>
    </div>
    <div class="container"><button class="btn btn-primary" type="submit">Update Preferences</button></div>
</form>
<?php if (isset($deleteErrorMessage)) { ?>
<div class="alert alert-danger" role="alert">
    <?php echo $deleteErrorMessage; ?>
</div>
<?php }?>
<div class="container mt-5"><button class="btn btn-danger" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Delete Account</button></div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>


</body>

</html>