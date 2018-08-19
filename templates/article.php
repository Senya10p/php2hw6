<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новость</title>
</head>
<body>
    <h1>PHP-2</h1>
    <h2>6 урок</h2>
    <h2>Модели данных и ООП</h2>
    <h4>Домашняя работа</h4>
    <h2>Новости</h2>

    <h1>{{article.header}}</h1>
    {{article.text}}
    <p>(Автор: {{article.author.name ?? 'неизвестен'}} )</p>

    <br><br>
    <a href="/index/">Все новости</a>

</body>
</html>
