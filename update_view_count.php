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
    die("Подключение не удалось: " .$e->getMessage());
}

// Get the video ID from the POST data
$videoId = $_POST["video_id"];

// Increment the view count for this video
$sql = "UPDATE videos SET views = views + 1 WHERE id = :videoId";
$stmt = $pdo->prepare($sql);
$stmt->execute([':videoId' => $videoId]);

?>

