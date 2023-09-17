document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("user-menu-button");
    const userMenu = document.getElementById("user-menu");

    // Скрываем меню изначально
    userMenu.style.display = 'none';

    toggleButton.addEventListener('click', function(event) {
        // Отменяем всплытие события click, чтобы оно не передавалось на document
        event.stopPropagation();

        if (userMenu.style.display === 'none' || userMenu.style.display === '') {
            userMenu.style.display = 'block';
        } else {
            userMenu.style.display = 'none';
        }
    });

    document.addEventListener('click', function() {
        userMenu.style.display = 'none';
    });

    // Предотвращаем закрытие меню при клике на само меню
    userMenu.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
