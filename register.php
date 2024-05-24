<?php
include 'select_event.php';
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "event_dp";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$FirstName = "";
$LastName = "";
$PhoneNumber = "";
$mail = "";
$errorMessage = "";
$successMessage = "";

// Fetch event_id from session
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : '';

// Debug: Check session variable
echo "Session event_id: " . $event_id . "<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $mail = $_POST["mail"];

    // Debug: Check form submission data
    echo "Form submission:<br>";
    var_dump($_POST);

    if (empty($FirstName) || empty($LastName) || empty($PhoneNumber) || empty($mail)) {
        $errorMessage = "All fields are required";
    } else {
        // Check if event ID exists
        $stmt_select = $connection->prepare("SELECT * FROM event WHERE id = ?");
        $stmt_select->bind_param("i", $event_id);
        $stmt_select->execute();
        $result_select = $stmt_select->get_result();

        if ($result_select->num_rows == 0) {
            $errorMessage = "Invalid event ID";
        } else {
            // Attempt to insert user information into the database
            $stmt_insert = $connection->prepare("INSERT INTO user_info (event_id, FirstName, LastName, PhoneNumber, mail) VALUES (?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("issss", $event_id, $FirstName, $LastName, $PhoneNumber, $mail);
            if ($stmt_insert->execute()) {
                // If successful, send confirmation email
                $to = $mail;
                $subject = "Event Registration Confirmation";
                $message = "Hello $FirstName $LastName,\n\nThank you for registering for our event. We look forward to seeing you there!\n\nBest regards,\nEvent Team";
                $headers = "From: no-reply@yourevent.com";

                // Send email
                if (mail($to, $subject, $message, $headers)) {
                    // If email sent successfully, display success message
                    $successMessage = "Registration successful and confirmation email sent.";
                } else {
                    // If email sending fails, display error message
                    $errorMessage = "Registration successful but failed to send confirmation email.";
                }
            } else {
                // If the query execution failed, display an error message
                $errorMessage = "Error: " . $stmt_insert->error;
            }
        }
    }
}
?>

<!-- HTML code remains the same -->


<!-- HTML code remains the same -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2>Add Event</h2>
    <?php
    if (!empty($errorMessage)) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
<form method="post">
    <!-- Add a hidden input field to pass the event_id -->
    <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event_id); ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="FirstName" value="<?php echo htmlspecialchars($FirstName); ?>">
        </div>
    </div>
    <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="LastName" value="<?php echo htmlspecialchars($LastName); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="PhoneNumber" value="<?php echo htmlspecialchars($PhoneNumber); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="mail" value="<?php echo htmlspecialchars($mail); ?>">
            </div>
        </div>
    <!-- Other form fields... -->
    <div class="row mb-3">
        <div class="offset-sm-3 col-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="./index.php" role="button">Cancel</a>
        </div>
    </div>
</form>

</div>
</body>
</html>