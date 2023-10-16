<?php
session_start();

$access_code = "vikingFortGuard365";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['code']) && $_POST['code'] === $access_code) {
        $_SESSION['special_access'] = true;
        header('Location: admin_panel.php');
    } else {
        $error_message = "Неверный специальный код доступа!";
    }
}
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
              <li><a class="menu__item" href="dop.php">Дополнительная информация</a></li>
              <li><a class="menu__item" href="speshal.php">Про специалиста по охране труда</a></li>
            </ul>
          </nav>
    </header>
    <main>
    <h1>Вход для доступа к панели администратора</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="code"><b>Специальный код доступа:</b></label>
        <input type="password" id="code" name="code" required>
        <button type="submit" class="fast">Войти</button>
    </form>

    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</main>
    </main>
    <footer class="casd">
        <div class="container">
            <div class="footerInner">
                <a class="footerA" href = "#">Контакт связи +79085724115</a>
                <a class="footerA" href = "#">Старница в телеграме @AlexAllik</a>
                <a class="footerA" href = "#">Юридическая информация</a>
            </div>
            <div class="footerInner">
                
            </div>
        </div>
    </footer>
</body>
</html>