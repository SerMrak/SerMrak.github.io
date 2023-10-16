<?php
// Start the session
/*session_start();

if (!isset($_SESSION['special_access']) || $_SESSION['special_access'] !== true) {
    header('Location: spisok.php');
    exit();
}

// Create a connection to your database
// Replace with your own database connection settings
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, location FROM kindergartens ORDER BY name";
$result = $conn->query($sql);

// Установка соединения с базой данных

$sql = "SELECT * FROM users WHERE (position = 'ZAVED' OR position = 'ZAM') AND approved = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод списка пользователей, ожидающих подтверждения (например, в виде HTML-таблицы)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        // Добавьте кнопку подтверждения для каждой записи
        echo "<td><form action='approve_user.php' method='post'><input type='hidden' name='user_id' value='" . $row["id"] . "'><button type='submit'>Подтвердить</button></form></td>";
        echo "</tr>";
    }
} else {
    echo "Нет пользователей, ожидающих подтверждения!";
}

// Освобождение ресурсов
$result->free();
$conn->close();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрирование садиков</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <!-- Add your header code here -->
    </header>
    <main>
        <h1>Администрирование садиков</h1>
        <form id="add-kindergarten-form">
            <label for="kg_name"><b>Название садика:</b></label>
            <input type="text" id="kg_name" name="kg_name" required>

            <label for="kg_location"><b>Расположение садика:</b></label>
            <input type="text" id="kg_location" name="kg_location" required>
            
            <button type="submit">Добавить садик</button>
        </form>
        <div id="message"></div>

        <!-- Output the list of kindergartens -->
        <h2>Список садиков</h2>
        <table>
            <tr>
                <th>Название садика</th>
                <th>Расположение</th>
            </tr>
            <?php
            // Этот код выводит список садиков в виде HTML-таблицы
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>"; // Используйте htmlspecialchars для безопасного вывода
                    echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Нет садиков</td></tr>";
            }
            ?>
        </table>
        
        <!-- Форма подтверждения аккаунта -->
        <?php
        // Ваш код должен содержать переменную $user_id для этой формы
        echo "<form method='post' action='approve_account.php'>";
        echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";
        echo "<button type='submit' class='approve-btn'>Подтвердить аккаунт</button>";
        echo "</form>";
        ?>
    </main>
    <footer>
        <!-- Add your footer code here -->
    </footer>
    <script src="admin.js"></script>
</body>
</html>