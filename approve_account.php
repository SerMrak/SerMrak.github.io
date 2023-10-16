<?php
// Получение ID пользователя, которого нужно подтвердить и разфильтровка данных 
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
} elseif (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
} else {
    echo "Недостаточно данных для подтверждения пользователя.";
    exit();
}

// Подключение к базе данных
$conn = new mysqli("localhost", "username", "password", "database_name");

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обновление статуса пользователя на подтвержденный (например, 1)
$sql = "UPDATE users SET status = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    // Перенаправление обратно на административную панель
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Закрытие соединения и запроса
$stmt->close();
$conn->close();
?>
