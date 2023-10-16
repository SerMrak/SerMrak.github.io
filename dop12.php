<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алекс+</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function disableSeek() {
            document.getElementById("myVideo").currentTime = 0;
    
            // Send an AJAX request to update the view count
            let videoId = $("#myVideo").data("video-id");
            $.ajax({
                url: "update_view_count.php",
                method: "POST",
                data: {video_id: videoId},
                success: function(response) {
                    console.log("View count updated!");
                }
            });
        }
    </script>
    
    <script>
        // Get the video ID from the data attribute of the video element
        let videoId = $("#myVideo").data("video-id");
    
        // Send an AJAX request to get the view count for this video
        $.getJSON("view_count.php?video_id=" + videoId, function(data) {
            // Update the view count on the page
            $("#viewCount").text(data.viewCount + " views");
        });
    </script>
    
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
              <li><a class="menu__item" href="index1.html">На главную</a></li>
              <li><a class="menu__item" href="speshal.html">Про специалиста по охране труда</a></li>
            </ul>
          </nav>
    </header>
    <main>
        <article class="fade">
            <button id="button" class="fase">Общие (учебные) инструктажи</button>
            <div id="div1" class="fase1">
                <video id="myVideo" controls="true" ontimeupdate="disableSeek()" data-video-id="123">
                    <source src="myVideo.mp4" type="video/mp4">
                </video>
                <div id="viewCount">Просмотревшие: 0</div>
            </div>
            <button id="button1" class="fase">Инструктажи на рабочих местах</button>
            <div id="div2" class="fase1">
                <video id="myVideo" controls="true" ontimeupdate="disableSeek()" data-video-id="123">
                    <source src="myVideo.mp4" type="video/mp4">
                </video>
                <div id="viewCount">Просмотревшие: 0</div>
            </div>
            <button id="button2" class="fase">Специальные инструктажи</button>
            <div id="div3" class="fase1">
                <video id="myVideo" controls="true" ontimeupdate="disableSeek()" data-video-id="123">
                    <source src="myVideo.mp4" type="video/mp4">
                </video>
                <div id="viewCount">Просмотревшие: 0</div>
            </div>
            <button id="button3" class="fase">Внеплановые (целевые) инструктажи</button>
            <div id="div4">
                <video id="myVideo" controls="true" ontimeupdate="disableSeek()" data-video-id="123">
                    <source src="myVideo.mp4" type="video/mp4">
                </video>
                <div id="viewCount">Просмотревшие: 0</div>
            </div>
            <button id="button4" class="fase">Положения (основные документы)</button>
            <div id="div5" class="fase1">
                <a href="document.pdf" class="document-link">Document</a>
                <div id="views-count">0</div>
            </div>
            <button id="button5" class="fase">Инструкции по охране труда</button>
            <div id="div6" class="fase1">
                <a href="document.pdf" class="document-link">Document</a>
                <div id="views-count">0</div>
            </div>
            <button id="button6" class="fase">Инструкции по технике безопасности</button>
            <div id="div7" class="fase1">
                <a href="document.pdf" class="document-link">Document</a>
                <div id="views-count">0</div>
            </div>
            <button id="button7" class="fase">Разное</button>
            <div id="div8">
                <a href="document.pdf" class="document-link">Document</a>
                <div id="views-count">0</div>
            </div>
        </article>
    </main>
    <footer>
        <div class="container">
            <div class="footerInner">
                <p class="footerA">Контакт связи +79085724115</p>
                <p class="footerA">Старница в телеграме @AlexAllik</p>
                <p class="footerA">Юридическая информация</p>
                <a class="footerA" href="polit.php">Конфиденциальность и персональные данные</a>
            </div>
        </div>
    </footer>
    
</body>
</html>