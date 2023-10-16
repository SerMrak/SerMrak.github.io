<?php

// Connect to the database
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Подключение не удалось: " . $e->getMessage());
}

// Get the video ID from the query string
$videoId = $_GET["video_id"];

// Get the total view count for this video
$sql = "SELECT views FROM videos WHERE id = :videoId";
$stmt = $pdo->prepare($sql);
$stmt->execute([':videoId' => $videoId]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$viewCount = $row["views"];

// Return the view count as a JSON object
header('Content-Type: application/json');
echo json_encode(array('viewCount' => $viewCount));

?>
