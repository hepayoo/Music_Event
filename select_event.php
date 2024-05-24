<?php


if (isset($_GET['event_id'])) {
    $event_id = (int)$_GET['event_id']; // Get the event ID from the URL parameter
    $_SESSION['event_id'] = $event_id; // Set the event ID in the session
    
    // Redirect to register.php with event_id in URL
    header('Location: register.php?event_id=' . $event_id); 
    exit();
}
?>