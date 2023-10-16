<?php
header('Content-Type: application/json');
$response = array('success' => false);

// Your privilege check here to limit access
// ...

$kg_name = $_POST['kg_name'];
$kg_location = $_POST['kg_location'];

if (empty($kg_name) || empty($kg_location)) {
    $response['error'] = 'Поля обязательны';
    echo json_encode($response);
    exit();
}

$conn = new mysqli('localhost', 'username', 'password', 'database_name');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$stmt = $conn->prepare('INSERT INTO kindergartens (name, location) VALUES (?, ?)');
$stmt->bind_param('ss', $kg_name, $kg_location);

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['error'] = $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
exit();
?>
