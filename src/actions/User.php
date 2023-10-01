<?php
require_once 'Database.php';
require_once 'helpers.php';

class User {
    private $conn;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $passwordConfirmation;

    public function __construct($firstName, $lastName, $email, $password, $passwordConfirmation)
    {
        $this->conn = Database::getInstance()->getConnection();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirmation = $passwordConfirmation;
    }

    // Метод для добавления пользователя в базу данных
    public function addUserToDatabase()
    {
        // Проверка, что пароль и его подтверждение совпадают
        if ($this->password !== $this->passwordConfirmation) {
            // Обработка ошибки пароля
            return false;
        }

        // Генерация соли
        $salt = generateSalt();

        // Хэширование пароля с использованием соли
        $hashedPassword = password_hash($this->password . $salt, PASSWORD_DEFAULT);

        // Подготовка SQL-запроса для вставки данных пользователя
        $stmt = $this->conn->prepare("INSERT INTO users (`name`, last_name, email, password_hash, salt) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->firstName, $this->lastName, $this->email, $hashedPassword, $salt);

        // Выполнение SQL-запроса
        if ($stmt->execute()) {
            // Пользователь успешно добавлен в базу данных
            return true;
        } else {
            // Обработка ошибки добавления пользователя
            return false;
        }
    }

    // Метод аутентификации пользователя
    public function authenticate($email, $password)
    {
        // Запрос на поиск пользователя с указанным email
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $hashedPassword = $user['password_hash'];
            $salt = $user['salt'];

            // Проверка пароля
            if (password_verify($password . $salt, $hashedPassword)) {
                return true; // Авторизация успешна
            } else {
                return false; // Неверный пароль
            }
        } else {
            return false; // Пользователь с указанным email не найден
        }
    }
}

//echo "Ошибка при выполнении SQL-запроса: " . $stmt->error;
