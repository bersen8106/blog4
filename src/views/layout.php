<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <script src="https://cdn.tailwindcss.com"></script>-->
    <link href="../../public/assets/css/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="min-h-screen">
<div class="flex flex-col h-screen">

    <?php
    include 'includes/header.php';
    ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
<!--            <p>Now you are on the Layout page</p>-->
            <?php
            require_once '../src/router.php';
            ?>
        </div>
    </main>

    <?php
    include 'includes/footer.php';
    ?>

</div>
</body>
</html>