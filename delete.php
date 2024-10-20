<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Enter first name to delete:
        <input type="text" name="fname" required>
        <br/>
        <input type="submit" name="submit" value="Delete">
    </form>
</body>
</html>

<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fname'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    
    // Prepare the SQL delete query
    $sql = "DELETE FROM MyGuests WHERE firstname = '$fname'";
    
    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Record deleted successfully.";
        } else {
            echo "No records found with the given first name.";
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
