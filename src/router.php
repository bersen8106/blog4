<?php
$uri = trim($_SERVER['REQUEST_URI'], '/' );
if ($uri === '') {
    require TEMPLATES . '/home.php';
}
elseif ($uri == 'login.php'){
    require VIEWS . '/templates/login.php';
}
elseif ($uri == 'register.php'){
    require VIEWS . '/templates/register.php';
}
elseif ($uri == 'src/actions/register_controller.php') {
    require '../src/actions/register_controller.php';
}
elseif ($uri == 'src/actions/registration_success.php') {
    require '../src/actions/registration_success.php';
}
elseif ($uri == 'src/actions/authenticate_controller.php') {
    require '../src/actions/authenticate_controller.php';
}
//elseif ($uri == 'home.php'){
//    require VIEWS . '/home.php';
//}
//elseif ($uri == 'about.php') {
//    require VIEWS . '/about.php';
//}
else{
    require VIEWS . '/templates/404.php';
}

// Список маршрутов
//$routes = [
//    '/' => 'HomeController',
//    '/about' => 'AboutController',
//    '/contact' => 'ContactController',
//];

//-----------------gpt----------------------//

// Получение текущего пути из URL
//$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Определение обработчика для текущего маршрута
//$controller = $routes[$currentPath] ?? '404Controller';

// Подключение соответствующего контроллера
//require_once 'controllers/' . $controller . '.php';

// Создание экземпляра контроллера и вызов его метода
//$controllerInstance = new $controller();
//$controllerInstance->handle();

// Пример базовых контроллеров
//class HomeController {
//    public function handle() {
//        echo "Welcome to the Home Page";
//    }
//}
//
//class AboutController {
//    public function handle() {
//        echo "About Us Page";
//    }
//}
//
//class ContactController {
//    public function handle() {
//        echo "Contact Us Page";
//    }
//}
//
//class NotFoundController {
//    public function handle() {
//        echo "Page Not Found";
//    }
//}
