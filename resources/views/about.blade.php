<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>О тестовом проекте</title>
</head>
<body>
    <h1 class="text-center">О тестовом проекте</h1>
    <div class="text-center p-3 mb-2 bg-light text-dark d-flex justify-content-around">
        @include('menu', ['page' => 'about'])
    </div>
    <div class="mt-2 p-2">
       <p сlass="p-3 mb-2">
Урок 1.<br>
Установка Laravel. Описание принципов работы и структуры фреймворка<br>
1. Настроить на локальной машине окружение для работы с фреймворком.<br>
2. Установить Laravel.<br>
</p>
<p сlass="p-3 mb-2">
3. Реализовать несколько страниц будущего агрегатора новостей:<br>
a. Страницу приветствия пользователей.<br>
b. Страницу с информацией о проекте.<br>
c. Страницу для вывода новостей.</p>
</div>
</body>
</html>