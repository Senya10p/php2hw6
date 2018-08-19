<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ошибка</title>
</head>
<body>
<header>
    <div style="text-align: center; "><h1 style="color: cornflowerblue"></h1></div>
</header>
<section>

    <div style="text-align: center; background-color: lightgreen"><h1 style="color: red ; font-size: 55px" >Внимание!</h1>
        <h1 style="color: cornflowerblue; font-size: 35px">
            <?php
            if ( is_array($errors) ) {
                foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach;
            } else {
                echo $errors;
            } ?>
        </h1>
        <img src="/templates/img/marvin.png" height="350px">
        <p><a href="/index/">Перейти на главную страницу</a></p>

    </div>
</section>
</body>
</html>