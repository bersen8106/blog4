<?php
require_once 'Database.php';
require_once 'User.php';

$db = Database::getInstance();
$conn = $db->getConnection();


// Обработка данных формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];



    // Создание нового объекта пользователя
    $user = new User($firstName, $lastName, $email, $password, $passwordConfirmation);
//    echo '<pre>';
//    print_r($user);
//    echo '</pre>';

    // Добавление пользователя в базу данных
    if ($user->addUserToDatabase()) {
        // Пользователь успешно добавлен в базу данных
        header('Location: http://blog4/');
        exit();
    } else {
        // Обработка ошибки добавления пользователя
        echo "Ошибка при добавлении пользователя в базу данных.";
    }
}

//class SignupController {
//    private $firstName;
//    private $lastName;
//    private $email;
//    private $password;
//    private $passwordConfirmation;
//
//    public function __construct($firstName, $lastName, $email, $password, $passwordConfirmation) {
//        $this->firstName = $firstName;
//        $this->lastName = $lastName;
//        $this->email = $email;
//        $this->password = $password;
//        $this->passwordConfirmation = $passwordConfirmation;
//    }
//}




//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $db = Database::getInstance();
//    $conn = $db->getConnection();
//
//    $user = new User($conn);
//
//    $name = $_POST['name'];
//    $last_name = $_POST['last_name'];
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//    if ($user->register($name, $last_name, $email, $password)) {
//        echo "Регистрация успешна. Вы можете войти в систему.";
//    } else {
//        echo "Ошибка регистрации. Пожалуйста, выберите другое имя пользователя.";
//    }
//}
