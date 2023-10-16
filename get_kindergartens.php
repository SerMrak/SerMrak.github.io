<?php
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'username', 'password', 'database_name');
if ($conn->connect_error) {
    die('{"error": "Connection failed: ' . $conn->connect_error . '"}');
}

$result = $conn->query('SELECT * FROM kindergartens');
$kindergartens = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $kindergartens[] = array('id' => $row['id'], 'name' => $row['name'], 'location' => $row['location']);
    }
}

echo json_encode($kindergartens);
$conn->close();
?>
