<?php
// Start the session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $position = $_POST["position"];
    $job = $_POST["job"];
    $kindergarten = $_POST["kindergarten"];
    
    // Validate the form data
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif ($password != $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Connect to the database
        $conn = new mysqli("localhost", "username", "password", "database_name");
        
        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $approved = 0;
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, position, job, kindergarten, approved) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $username, $email, $password_hash, $position, $job, $kindergarten, $approved);

        // Execute the statement
        if ($stmt->execute()) {
        // Redirect to the login page
        header("Location: index.php");
        exit();
            } else {
                $error = "Error: " . $stmt->error;
            }
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();
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
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
        <div class="headerInner">
            <a href="spisok.php"><img class="logo" src="images/Щит и молот.png"></a>
        </div>
        <h1 class="card">Алекс+</h1>
    </header>
    <main>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="border:1px solid #ccc">
            <div class="container2">
              <h1>Регистрация</h1>
              <p>Пожалуйста заполните анкету, чтобы зарегистрироваться на нашем сайте.</p>
              <hr>
          
              <label for="username"><b>Имя</b></label>
              <input type="text" placeholder="Введите своё имя" name="name" required>
      
              <label for="username"><b>Фамилия</b></label>
              <input type="text" placeholder="Введите свою фамилию" name="surname" required>

              <label for="username"><b>Отчество</b></label>
              <input type="text" placeholder="Введите свою отчество" name="patronymic" required>

              <label for="email"><b>Номер телефона</b></label>
              <input type="text" placeholder="Введите адрес номер телефона" name="phone_number" required>

              <label for="position"><b>Выберите должность:</b></label>
              <select name="position" id="position" required>
              <option value="">--Выберите должность--</option>
              <option value="ZAVED">Заведующий</option>
              <option value="ZAM">Зам по УВР</option>
              <option value="ZAM">Завхоз</option>
              <option value="OLDVOSP">Ст. воспитатель</option>
              <option value="VOSP">Воспитатель</option>
              <option value="VOSPLOG">Воспитатель логопед. группы</option>
              <option value="VOSPTRN">Воспитатель ТРН</option>
              <option value="METOD">Методист</option>
              <option value="LOG">Логопед</option>
              <option value="PSY">Психолог</option>
              <option value="SOC">Соцработник</option>
              <option value="MUSIC">Музрук</option>
              <option value="IGV">ИГВ</option>
              <option value="IFK">ИФК</option>
              <option value="DELO">Делопроизводитель</option>
              <option value="INSPECK">Инспектор по кадрам</option>
              <option value="CONTRAC">Контрактный управляющий</option>
              <option value="GLAVBUH">Главбух</option>
              <option value="PROGRAMER">Программист</option>
              <option value="HELPVOSP">Пом. воспитателя</option>
              <option value="SHEF">Шеф-повар</option>
              <option value="POVAR">Повар</option>
              <option value="COOK">Кух. работник</option>
              <option value="CLAD">Кладовщик</option>
              <option value="MASHIN">Машинист по стирке</option>
              <option value="KAST">Кастелянша</option>
              <option value="WORKER">Рабочий по ремонту</option>
              <option value="ELECT">Электрик</option>  
              <option value="SCUER">Сторож</option>  
              <option value="CLUB">Дворник</option>
              <option value="HOME">Уборщица</option>
              </select>

              <label for="kindergarten"><b>Выберите садик:</b></label>
              <select name="kindergarten" id="kindergarten" required>
                <option value="">--Выберите садик--</option>
              </select>

              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    fetch('get_kindergartens.php')
                        .then(response => response.json())
                        .then(data => {
                            const kgSelect = document.getElementById('kindergarten');
                            data.forEach(kg => {
                                const option = document.createElement('option');
                                option.text = kg.name + ' - ' + kg.location;
                                option.value = kg.id; // Измените здесь на 'id'
                                kgSelect.add(option);
                            });
                        })
                        .catch(error => {
                            console.error('Ошибка получения списка садиков:', error);
                        });
                });
              </script>


          
              <label for="password"><b>Пароль</b></label>
              <input type="password" id="psw" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Введите пароль" name="psw" placeholder="Введите пароль" name="psw" required>
          
              <label for="confirm_password"><b>Повторите пароль</b></label>
              <input type="password" id="psw-repeat" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Повторите пароль" name="psw-repeat" required>
          
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Запомнить меня
              </label>
          
              <p>Создавая учётную запись у нас, вы соглашаетесь с нашими <a href="#" style="color:dodgerblue">Условиями и Конфиденциальностью</a>.</p>
          
              <div class="clearfix">
                <a href="index.php"><button type="button" class="cancelbtn">Отмена</button></a>
                <a href="index1.php"><button type="submit" class="signupbtn">Зарегистрироваться</button></a>
              </div>
            </div>
          </form>

          <div id="message">
            <h3>Проверка вашего пароля:</h3>
            <p id="letter" class="invalid"><b>Запомните</b> ваш пароль сохраняется на сайте и проверяется системой </p>
            <p id="length" class="invalid">Нужно как минимум <b>8 символа в пароле</b></p>
          </div>

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
    <script src="script2.js"></script>
</body>
</html>