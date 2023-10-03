<?php
session_start();
?>
<!DOCTYPE html>
<html class="h-full bg-white" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--        <script src="https://cdn.tailwindcss.com"></script>-->
    <link href="../../public/assets/css/output.css" rel="stylesheet">
    <link href="../../public/assets/css/style.css" rel="stylesheet">
    <title>Document</title>

</head>
<body class="min-h-screen h-full">

<div class="flex flex-col h-screen">

    <?php
    ob_start();
    include 'includes/header.php';
    ?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!--            <p>Now you are on the Layout page</p>-->
            <?php
            require_once (SRC . '/router.php'); // Это абсолютный путь
            ?>
        </div>
    </main>

    <?php
    include 'includes/footer.php';
    ob_end_flush();
    ?>

</div>


<script src="public/assets/js/main.js"></script>
</body>
</html>