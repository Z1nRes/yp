<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pop it MVC</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="py-2 bg-light border-bottom ">
        <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="<?= app()->route->getUrl('/hello') ?>" class="nav-link link-dark px-2 active">Главная</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Помещения</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Подразделения</a></li>
        </ul>
        <ul class="nav">
            <?php
                if (!app()->auth::check()):
                    ?>
                    <li class="nav-item"><a href="<?= app()->route->getUrl('/login') ?>" class="nav-link link-dark px-2">Вход</a></li>
                <?php
                else:
                    ?>
                    <li class="nav-item"><a href="<?= app()->route->getUrl('/logout') ?>" class="nav-link link-dark px-2">Выход</a></li>
                    <li class="nav-item"><a href="<?= app()->route->getUrl('/signup') ?>" class="nav-link link-dark px-2">Регистрация</a></li>
                <?php
                endif;
            ?>
        </ul>
        </div>
    </nav>
</header>
<main class="p-5">
      <?= $content ?? '' ?>
</main>

</body>
</html>
