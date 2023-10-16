<?php
// Start the session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form dat
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate form data
    if (empty($username) || empty($password)) {
        $error = "Both fields are required.";
    } else {
        // Connect to the database
        $conn = new mysqli("localhost", "email", "password", "database_name");
        
        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare the SELECT statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();
        
        // Bind the result to variables
        $stmt->bind_result($id, $db_email, $db_password);

        // If the username exists
        if ($stmt->fetch()) {
            // Verify the password
            if (password_verify($password, $db_password)) {
                //Set session variables
                $_SESSION['email'] = $email;
                header("Location: .php");
                exit();
            } else {
                $error = "Incorrect password. Please try again.";
            }
        } else {
           $error = "Username not found. Please try again.";
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="container2">
                <h1>Войти</h1>
                <p>Введите свои данные для входа на сайт.</p>
                <hr>

                <label for="email"><b>Номер телефона</b></label>
                <input type="text" placeholder="Введите свой номер телефона" name="email" required>
                
                <label for="password"><b>Пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="password" required>

                <div class="clearfix">
                    <button type="submit" class="signinbtn">Войти</button>
                </div>
            </div>
        </form>
    </main>
    <footer class="casd">
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
