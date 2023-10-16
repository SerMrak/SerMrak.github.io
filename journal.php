<?php
session_start();

// Запросите данные сессии для заведующего
$userId = null;
$position = null;

if (isset($_SESSION['user_id']) && isset($_SESSION['position'])) {
    $userId = $_SESSION['user_id'];
    $position = $_SESSION['position'];
} else {
    die('Доступ запрещен: вы не авторизованы или у вас нет прав на просмотр этой страницы.');
}

// Подключение к базе данных
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT dv.user_id, u.name, u.position, dv.doc_id, d.title, dv.view_date FROM document_views as dv INNER JOIN users as u ON dv.user_id = u.id INNER JOIN documents as d ON dv.doc_id = d.id ORDER BY dv.view_date DESC";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алекс+</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <script src="jquery-3.6.4.min.js"></script>
        

        <div class="headerInner">
            <img class="logo" src="images/Щит и молот.png">
        </div>
        <h1 class="card">Алекс+</h1>
        <nav class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
              <span></span>
            </label>
            <ul class="menu__box">
              <li><a class="menu__item" href="speshal.php">Про специалиста по охране труда</a></li>
            </ul>
          </nav>
    </header>
    <div class="container">
        <h1>Журнал</h1>

        <?php
        // Проверьте, разрешено ли пользователю печатать журнал
        if ($position == "ZAVED" || $position == "ZAM") {
            echo '<button class="print-button no-print" onclick="window.print()">Распечатать журнал</button>';
        }
        ?>

        <table>
            <tr>
                <th>Имя пользователя</th>
                <th>Должность</th>
                <th>Номер документа</th>
                <th>Дата просмотра</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["position"] . '</td>
                            <td>' . $row["title"] . '</td>
                            <td>' . $row["view_date"] . '</td>
                          </tr>';
                }
            } else {
                echo '<tr><td colspan="4">Записи не найдены</td></tr>';
            }
            $conn->close();
            ?>
        </table>
    </div>
    <footer>
        <div class="container">
            <div class="footerInner">
                <a class="footerA" href = "#">Контакт связи +79085724115</a>
                <a class="footerA" href = "#">Старница в телеграме @AlexAllik</a>
                <a class="footerA" href = "#">Юридическая информация</a>
                <a class="footerA" href = "polit.php">Конфиденциальность и персональные данные</a>
            </div>
            <div class="footerInner">
                
            </div>
        </div>
    </footer>
</body>
</html>
