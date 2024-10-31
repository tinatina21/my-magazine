<?php
$host = 'localhost'; // Замени на свой хост
$username = 'root'; // Замени на своего пользователя
$password = 'root'; // Замени на свой пароль
$dbname = 'Visitors'; // Замени на имя своей базы данных

// Создание подключения
$conn = new mysqli($host, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// SQL-запрос для проверки пользователя
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Проверка результата запроса
if ($result->num_rows > 0) {
    // Пользователь найден, перенаправление на другую страницу
    header("Location: autorithation/success_auth.php");
    exit;
} else {
    // Пользователь не найден, вывод сообщения об ошибке
    header("Location: autorithation/undentified.php");
    exit;
}

// Закрытие соединения
$conn->close();
?>
