<h1>Home page</h1>
<p>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</p>
<?php

//require_once ACTIONS . '/Database.php';
//$db = Database::getInstance();
//$conn = $db->getConnection();
//$result = $conn->query($query);
//// Получение данных пользователя из результата запроса
//$userData = $conn->fetch_assoc();
//
//// Путь к изображению аватара пользователя
//$avatarPath = $userData['profile_picture'];
//
//if (isset($_SESSION['username'])){
//    $avatarPath = $userData['profile_picture'];
//}
//
//?>
