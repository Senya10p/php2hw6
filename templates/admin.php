<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админ-панель</title>
    <style>
        table { border-collapse: collapse; width: 500px; margin: 5px; } /* Убираем двойные линии между ячейками в таблице */
        td { vertical-align: middle; text-align: center; width: 70px }
    </style>
</head>
<body>
    <h1>PHP-2</h1>
    <h2>6 урок</h2>
    <h2>Админ-панель</h2>
    <h4>Домашняя работа</h4>
    <h4>Редактирование новостей</h4>
        <table border="1">
            <th>id</th><th>Заголовок</th><th>Статья</th><th>Автор</th>
            <?php foreach ($data as $article ) { ?>
                <tr>
                    <form action="/admin/index.php" method="post">
                        <td> <?php echo $article->id; ?></td>
                        <td><input type="text" name="header" value="<?php echo $article->header; ?>" ></td>

                        <td><textarea name="text" ><?php echo $article->text; ?></textarea></td>

                        <td><?php echo $article->author->name ?? 'неизвестен'; ?></td>

                        <td><button type="submit" name="update" value="<?php echo $article->id; ?>">Изменить</button></td>
                    </form>
                    <td>
                        <form action="/admin/index.php" method="post">
                            <button type="submit" name="del" value="<?php echo $article->id; ?>">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <hr><hr>
    <form action="/admin/index.php" method="post">
        <h4>Добавление новой записи</h4>
        Заголовок статьи: <input type="text" name="header" >
        <p>Текст статьи</p>
        <textarea cols="60" rows="10" name="text"></textarea>
        <br>
        <button type="submit">Добавить</button>
    </form>

</body>
</html>