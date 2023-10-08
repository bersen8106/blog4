<?php
session_start();

// Удаление переменных сеанса
session_unset();

// Уничтожение текущего сеанса
session_destroy();

    // Уничтожение текущего сеанса
    session_destroy();

    // Перенаправление на главную страницу или другую страницу после выхода
    header('Location: http://blog4/');
    exit;