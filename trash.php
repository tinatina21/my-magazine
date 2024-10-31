<!DOCTYPE html>
<html lang="ru"></html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Pinegrow Web Editor - Shop Bootstrap v5 Template">
        <meta name="author" content="">
        <title>Бекиш ИТ</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/blocks.css">
        <link href="./css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        include("header.php");
        // Подключение к базе данных
        $conn = new mysqli('127.0.0.1', 'root', '', 'Visitors');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Получение данных из таблицы cart
        $sql = "SELECT * FROM cart";
        $result = $conn->query($sql);
    ?>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Товар</th>
                    <th scope="col">Название товара</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        // Вывод данных каждой строки
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='" . $row["product_image"] . "' alt='Product image' style='width: 150px; height: 150px;'></td>";
                            echo "<td>" . $row["product_id"] . "</td>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . $row["product_description"] . "</td>";
                            echo "<td>1</td>"; // Замените это на реальное количество
                            echo "<td>" . $row["product_price"] . " ₽</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Корзина пуста";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
        <button class="add-to-cart-btn" style='width: 100%; margin-bottom: 20px;' onclick="window.location.href='order.php'"><p class="text">Оформить заказ</p></button>
    </div>
    <?php
        include("footer.php");
    ?>
    <script src="script/trash.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

