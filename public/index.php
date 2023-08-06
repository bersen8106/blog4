<?php

define("ROOT", dirname(__DIR__));
define("SRC", ROOT . '/src');
define("VIEWS", SRC . '/views');

echo 'Hello, this is point of entry from index.php';

$uri = trim($_SERVER['REQUEST_URI'], '/' );

if ($uri === '') {
    require VIEWS . '/layout.php';
}
//elseif ($uri == 'home.php'){
//    require VIEWS . '/home.php';
//}
//elseif ($uri == 'about.php') {
//    require VIEWS . '/about.php';
//}
//else{
//    require VIEWS . '/404.php';
//}