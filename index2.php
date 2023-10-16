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
      <script src="script3.js"></script>
    <script>
        $(document).ready(function(){
            $("#div").hide()
            $("#input").click(function(){
                $("#div").toggle();
            });
        });

        $(document).ready(function(){
          $("#печать").hide()
          $("#кнопка").click(function(){
              $("#печать").toggle();
          });
      });

      $(document).ready(function(){
          $("#печать1").hide()
          $("#кнопка1").click(function(){
              $("#печать1").toggle();
          });
      });

      $(document).ready(function(){
          $("#печать2").hide()
          $("#кнопка2").click(function(){
              $("#печать2").toggle();
          });
      });

    </script>
     
    <div>
        <input id="input" type="checkbox">
        <div class="gyr" id="div">
            <button id="кнопка" class="far2"><img class="far" src="images/редактор.png"></button>
            <button id="кнопка1" class="far2"><img class="far" src="images/замена.png"></button>
            <button id="кнопка2" class="far2"><img class="far" src="images/шрифт.png"></button>
        </div>
        <div id="печать" class="вон">
            <button class="сыр"><img class="сыр2" src="images/удалить.png"></button>
            <button class="сыр"><img class="сыр2" src="images/вернуть.png"></button>
            <button class="сыр"><img class="сыр2" src="images/добавить.png"></button>
        </div>
        <div id="печать1" class="вон">
            <button class="сыр"><img class="сыр2" src="images/удалить.png"></button>
            <button class="сыр"><img class="сыр2" src="images/вернуть.png"></button>
            <button class="сыр"><img class="сыр2" src="images/добавить.png"></button>
        </div>
        <div id="печать2" class="вон">
            <button class="сыр"><img class="сыр2" src="images/удалить.png"></button>
            <button class="сыр"><img class="сыр2" src="images/вернуть.png"></button>
            <button class="сыр"><img class="сыр2" src="images/добавить.png"></button>
        </div>
    </div>
    

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
          <script src="script.js"></script>
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