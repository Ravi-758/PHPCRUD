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

// Corrected SQL query (removed the extra comma before FROM)
$sql = "SELECT id, firstname, lastname,email FROM MyGuests";

$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." Email:- ".$row["email"]."<br/>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
