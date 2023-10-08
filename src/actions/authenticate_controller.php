<?php
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fileUpload = $_POST['fileUpload'];

    // Создание объекта класса User
    $user = new User('', '', $email, $fileUpload, $password, '');

    // Вызов метода аутентификации пользователя
    if ($user->authenticate($email, $password)) {
        // Аутентификация успешна
        $_SESSION['username'] = $email;
        echo "Авторизация успешна. Добро пожаловать, " . htmlspecialchars($email) . "!";
        header('Location: http://blog4/');
        // В этом месте вы можете перенаправить пользователя на другую страницу или выполнить другие действия после успешной авторизации.
    } else {
        // Неверный email или пароль
        echo "Неверный email или пароль. Попробуйте снова.";
        // Возвращение на страницу входа или выполнение других действий в случае неудачной авторизации.
    }
} else {
    // Недопустимый метод запроса
    echo "Недопустимый метод запроса.";
}