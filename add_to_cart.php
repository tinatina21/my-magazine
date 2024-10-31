<?php
    // Подключение к базе данных
    $conn = new mysqli('127.0.0.1', 'root', '', 'Visitors');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        // Запрос на добавление товара в корзину
        $sql = "INSERT INTO cart (product_id) VALUES ('$product_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Товар успешно добавлен в корзину";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>
