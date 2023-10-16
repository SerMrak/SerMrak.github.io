<?php
// Запускаем сессию
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Подключение к базе данных
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем информацию о текущем пользователе из сессии
$user_id = $_SESSION["user_id"];
$user_role = $_SESSION["user_role"];

// Проверяем, является ли текущий пользователь заведующим, администратором или заместителем
if ($user_role == "ZAM" || $user_role == "ZAVED" || $user_role == "ADMIN") {
    // Получаем user_id из POST запроса
    $user_to_approve_id = intval($_POST["user_id"]);

    // Обновляем столбец "approved" в таблице "users"
    $sql = "UPDATE users SET approved = 1, approver_id = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $user_id, $user_to_approve_id);
        $stmt->execute();
        $stmt->close();
    }

    echo "Аккаунт сотрудника успешно подтверждён!";
} else {
    echo "У вас недостаточно прав для выполнения этого действия!";
}

// Закрываем соединение с базой данных
$conn->close();
?>
