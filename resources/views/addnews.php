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
    <title>Добавить новость</title>
</head>
<body>
    <h1 class="text-center">Добавить новость</h1>
    <div class="text-center p-3 mb-2 bg-light text-dark d-flex justify-content-around">
    <?php include_once "menu.php"; ?>
    </div>
    <div class="mt-2 p-2">


    <div class="mt-2 p-2 text-center">
     
    <form class="form_send_news_style" action="#" method="post">
      <label>Заголовок новости</label><br>
      <p><textarea rows="1" cols="45" name="discreption" placeholder="Заголовок"></textarea></p>
      <label>Краткое описание новости</label><br>
      <p><textarea rows="3" cols="45" name="discreption"  placeholder="Краткое описание"></textarea></p>
      <label>Полная новость</label><br>
      <p><textarea rows="10" cols="45" name="fullnews"  placeholder="Полная новость"></textarea></p>
      <button class="form_send_news" type="submit" name="form_send_news">Отправить новость</button>
</form>
        </div>
    </div>
</body>
</html>