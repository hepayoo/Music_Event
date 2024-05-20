<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "event_dp";
$connection = new mysqli($servername, $username, $password, $database);

$date = "";
$title = "";
$image = "";

$errorMessage = "";
$successMessage =  "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST["date"];
    $title = $_POST["title"];
    $image = $_POST["image"];
}

do {
    if (empty($date) || empty($title) || empty($image)) {
        $errorMessage = "All the fields are required";
        break;
    }

    // Insert new event into database
    $sql = "INSERT INTO event (date, title, image) VALUES ('$date', '$title', '$image')";
    $result = $connection->query($sql);

    if (!$result) {
        $errorMessage = "Invalid query: " . $connection->error;
        break;
    }

    $date = "";
    $title = "";
    $image = "";

    $successMessage = "Event added correctly";
    header("location:./index.php");
    exit;
} while (false)
?>

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
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="image" value="<?php echo $image; ?>">
            </div>
        </div>
        <?php
        if (!empty($successMessage)) {
            echo "<div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>";
        }
        ?>
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
