<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
</head>
<body>
    <h1>PHP-2</h1>
    <h2>6 урок</h2>
    <h2>Модели данных и ООП</h2>
    <h4>Домашняя работа</h4>
    <h2>Новости</h2>

    {% for news in article %}

    <article>
        <h1><a href="/article/?id={{news.id}}">{{news.header}}</a></h1>
        <p>{{news.text}}</p>
        <p>(Автор: {{news.author.name ?? 'неизвестен'}} )</p>
    </article>

    {% endfor %}

</body>
</html>
