<?php

function connectToDB()
{
// Установка параметров подключения к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogDB";

// Создание нового объекта mysqli для подключения к базе данных
    $conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения на ошибки
    if ($conn->connect_error) {
        die("Ошибка соединения: " . $conn->connect_error);
    }

// Установка кодировки соединения
    $conn->set_charset("utf8");

// Возвращение объекта соединения
    return $conn;
}

connectToDB();