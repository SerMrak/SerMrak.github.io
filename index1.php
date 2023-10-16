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
              <li><a class="menu__item" href="drop.php">Дополнительная информация</a></li>
              <li><a class="menu__item" href="speshal.php">Про специалиста по охране труда</a></li>
            </ul>
          </nav>
    </header>
    <main>
        <article class="sale">
            <div class="container">
                <div class="saleInner">
                    <h1></h1>
                    <h2></h2>
                </div>
            </div>
        </article>
        <article class="text">
            <div class="container">
                <div class="textInner">
                    <div class="column">
                        <h3>Журналы</h3>
                        <p> <button id="restrictedButton" class="fast" type="sumbit">Ограниченные Документы</button>
                        <script>
                        document.getElementById("restrictedButton").addEventListener("click", function() {
                            const position = "<?php echo $position; ?>";
                            let documentsUrl = "journal.php";
                            
                            switch (position) {
                                case "ZAVED, ZAM":
                                    window.location.href = documentsUrl;
                                    break;
                                default:
                                    alert("Доступ к данной функции ограничен для вашей должности.");
                                    return;
                            }
                        });
                        </script>

                        </p>
                    </div>
                    <div class="column">
                        <h3>Аккаунт</h3>
                        <p> <a href="account.php"><button type="submit" class="fast">Зайти</button></a> </p>
                    </div>
                    <div class="column">
                        <h3>Тесты</h3>
                        <p> <a href="index2.php"><button type="submit" class="fast">Пройти тест</button></a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </main>
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