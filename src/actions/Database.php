<?php

class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'blogDB');

        if ($this->conn->connect_error) {
            die("Ошибка подключения: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$db = Database::getInstance();
$conn = $db->getConnection();


//function connectToDB()
//{
//// Установка параметров подключения к базе данных
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "blogDB";
//
//// Создание нового объекта mysqli для подключения к базе данных
//    $conn = new mysqli($servername, $username, $password, $dbname);
//
//// Проверка соединения на ошибки
//    if ($conn->connect_error) {
//        die("Ошибка соединения: " . $conn->connect_error);
//    }
//
//// Установка кодировки соединения
//    $conn->set_charset("utf8");
//
//// Возвращение объекта соединения
//    return $conn;
//}
//
//connectToDB();