<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        First name: 
        <input type="text" name="fname" required>
        <br/>
        <br/>
        Last name: 
        <input type="text" name="lname">
        <br/>
        <br/>
        Enter email:
        <input type="email" name="email" required>
        <br/>
        <br/>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Prepare the SQL query
    $sql = "INSERT INTO myguests (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
