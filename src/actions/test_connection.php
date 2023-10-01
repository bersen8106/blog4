<?php
require_once('Database.php');

// Получаем экземпляр базы данных
$db = Database::getInstance();

// Получаем соединение с базой данных
$conn = $db->getConnection();

if ($conn->ping()) {
    echo "Подключение к базе данных активно.";
} else {
    echo "Подключение к базе данных неактивно. Ошибка: " . $conn->error;
}
var_dump($conn);