<?php
// Подключение к базе данных
$servername = "localhost"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль базы данных
$dbname = "Visitors"; // Имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$first_name = $_POST['FirstName'];
$last_name = $_POST['LastName'];
$email = $_POST['email']; // Добавили определение переменной $email
$password = $_POST['password']; // Добавили определение переменной $password

// Вставка данных в таблицу
$sql = "INSERT INTO users (FirstName, LastName, email, password)
VALUES ('$first_name', '$last_name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
   // echo "Новая запись успешно добавлена";
   header("Location: ./autorithation/success.php");
    exit;
} else {
    header("Location: ./autorithation/fail_registration.php");
    exit;
}

// Закрытие соединения
$conn->close();
?>
