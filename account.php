<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit();
}

// Connect to the database
$conn = new mysqli("localhost", "username", "password", "database_name");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the current user's data
$stmt = $conn->prepare("SELECT username, position, job FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$stmt->bind_result($username, $position, $job);
$stmt->fetch();
$stmt->close();

// Получаем информацию о текущем пользователе из сессии
$user_id = $_SESSION["user_id"];
$user_role = $_SESSION["user_role"];

// Проверяем, существует ли заведующий в таблице
$sql = "SELECT * FROM users WHERE position = 'ZAVED'";
$result = $conn->query($sql);
$has_manager = ($result->num_rows > 0);

// Проверяем, является ли текущий пользователь заместителем, заведующим или администратором
if ($user_role == "ZAM" || $user_role == "ZAVED" || $user_role == "ADMIN") {
    // Получаем информацию о пользователях, чьи аккаунты нужно подтвердить
    $sql = "SELECT * FROM users WHERE position = 'SOTR' AND approved = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод списка сотрудников, ожидающих подтверждения (например, в виде HTML-таблицы)
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Position</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["position"] . "</td>";
            // Добавляем кнопку подтверждения для заместителя, заведующего или администратора
            if ($user_role == "ZAM" || $user_role == "ZAVED" || $user_role == "ADMIN") {
                echo "<td><form action='approve_user.php' method='post'><input type='hidden' name='user_id' value='" . $row["id"] . "'><input type='submit' value='Подтвердить'></form></td>";
            } else {
                echo "<td>Недостаточно прав для подтверждения этого аккаунта</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Нет сотрудников, ожидающих подтверждения!";
    }
} else {
    echo "Недостаточно прав для доступа к этой странице!";
}

 // Проверяем, является ли пользователь заместителем или заведующим
if ($user_role === "ZAVED" || $user_role === "ZAM") {
    // Отображаем кнопку "Подтвердить" только для заместителей и заведующих
    echo "<form action='approve_user.php' method='post'>
          <input type='hidden' name='user_id' value='" . $row["id"] . "'>
          <input type='submit' value='Подтвердить'>
          </form>";
}


$conn->close();

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
              <li><a class="menu__item" href="index1.php">На главную</a></li>
              <li><a class="menu__item" href="speshal.php">Про специалиста по охране труда</a></li>
            </ul>
          </nav>
    </header>
    <main>
    <h1 class="card1"> ФИО: <?php echo $username; ?>.</h1>
    <h1 class="card1">Должность: <?php echo $position; ?>.</h1>
    <h1 class="card1">Место работы: <?php echo $job; ?>.</h1>

<button id="openedDocuments" class="fast" type="sumbit">Документы</button>
<script>
    document.getElementById("openedDocuments").addEventListener("click", function() {
        const position = "<?php echo $position; ?>";
        let documentsUrl = "";
        
        switch (position) {
            case "ZAVED, ZAM":
                documentsUrl = "dop.php";
                break;
            case "OLDVOSP":
                documentsUrl = "dop1.php";
                break;
            case "VOSP":
                documentsUrl = "dop2.php";
                break;
            case "VOSPLOG":
                documentsUrl = "dop3.php";
                break;
            case "VOSPTRN":
                documentsUrl = "dop4.php";
                break;
            case "METOD":
                documentsUrl = "dop5.php";
                break;
            case "LOG":
                documentsUrl = "dop6.php";
                break;
            case "PSY":
                documentsUrl = "dop7.php";
                break;
            case "SOC":
                documentsUrl = "dop8.php";
                break;
            case "MUSIC":
                documentsUrl = "dop9.php";
                break;
            case "IGV":
                documentsUrl = "dop10.php";
                break;
            case "IFK":
                documentsUrl = "dop11.php";
                break;
            case "DELO":
                documentsUrl = "dop12.php";
                break;
            case "INSPECK":
                documentsUrl = "dop13.php";
                break;
            case "CONTRAC":
                documentsUrl = "dop14.php";
                break;
            case "GLAVBUH":
                documentsUrl = "dop15.php";
                break;
            case "PROGRAMER":
                documentsUrl = "dop16.php";
                break;
            case "HELPVOSP":
                documentsUrl = "dop17.php";
                break;
            case "SHEF":
                documentsUrl = "dop18.php";
                break;
            case "POVAR":
                documentsUrl = "dop19.php";
                break;
            case "COOK":
                documentsUrl = "dop20.php";
                break;
            case "CLAD":
                documentsUrl = "dop21.php";
                break;
            case "MASHIN":
                documentsUrl = "dop22.php";
                break;
            case "KAST":
                documentsUrl = "dop23.php";
                break;
            case "WORKER":
                documentsUrl = "dop24.php";
                break;
            case "ELECT":
                documentsUrl = "dop25.php";
                break;
            case "SCUER":
                documentsUrl = "dop26.php";
                break;
            case "CLUB":
                documentsUrl = "dop27.php";
                break;
            case "HOME":
                documentsUrl = "dop28.php";
                break;
            default:
                alert("Ваша должность не поддерживается.");
                return;
        }

        window.location.href = documentsUrl;
    });
</script>

    </main>
    <footer class="casd">
        <div class="container">
            <div class="footerInner">
                <p class="footerA">Контакт связи +79085724115</p>
                <p class="footerA">Старница в телеграме @AlexAllik</p>
                <p class="footerA">Юридическая информация</p>
                <p class="footerA">Конфиденциальность и персональные данные</p>
            </div>
        </div>
    </footer>

</body>
</html>