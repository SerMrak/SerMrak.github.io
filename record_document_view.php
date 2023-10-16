<?php
// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $document_id = $_POST["document_id"];

    // Connect to the database
    $conn = new mysqli("localhost", "username", "password", "database_name");

    // Error checking
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO document_views (user_id, document_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $document_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Recorded document views successfully.";
    } else {
        echo "An error occurred: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
