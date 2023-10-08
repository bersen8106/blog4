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
    private $fileUpload;

    public function __construct($firstName, $lastName, $email, $password, $passwordConfirmation, $fileUpload)
    {
        $this->conn = Database::getInstance()->getConnection();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirmation = $passwordConfirmation;
        $this->fileUpload = $fileUpload;
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

        $imageData = file_get_contents($this->fileUpload['tmp_name']);
//        var_dump($imageData);
//        die();

        // Подготовка SQL-запроса для вставки данных пользователя
//        $stmt = $this->conn->prepare("INSERT INTO users (`name`, last_name, email, password_hash, salt, profile_picture) VALUES (?, ?, ?, ?, ?, ?)");
//        $stmt->bind_param("sssssb", $this->firstName, $this->lastName, $this->email, $hashedPassword, $salt, $imageData);
        $stmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, password_hash, salt, profile_picture) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $this->firstName, $this->lastName, $this->email, $hashedPassword, $salt, $imageData);


        if ($stmt->execute()) {
//      Пользователь успешно добавлен в базу данных
            return true;
        } else {
//      Обработка ошибки добавления пользователя
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

    public function getProfilePicture($userId) {
        // Экранируем идентификатор пользователя для предотвращения SQL-инъекций
        $safeUserId = mysqli_real_escape_string($this->conn, $userId);

        // Формируем SQL-запрос
        $sql = "SELECT profile_picture FROM users WHERE id = '$safeUserId'";

        // Выполняем запрос
        $result = mysqli_query($this->conn, $sql);

        // Проверяем успешность выполнения запроса
        if ($result) {
            // Получаем результат запроса в виде ассоциативного массива
            $row = mysqli_fetch_assoc($result);

            // Получаем значение поля profile_picture
            $profilePictureData = $row['profile_picture'];

            // Освобождаем ресурсы результата запроса
            mysqli_free_result($result);

            return $profilePictureData;
        } else {
            // Обработка ошибки выполнения запроса
            return null;
        }
    }
}

//        Выполнение SQL-запроса
//        $result = $stmt->execute();
//
//        if ($result === false) {
//            // Ошибка при выполнении запроса
//            $error = $stmt->error;
//            // Обработка ошибки, например, вывод сообщения или запись в журнал
//            echo "Ошибка при выполнении запроса: " . $error;
//        } else {
//            // Запрос выполнен успешно
//            echo "Данные успешно вставлены в базу данных.";
//            return false;
//        }

//echo "Ошибка при выполнении SQL-запроса: " . $stmt->error;
