<?php

namespace App\Controllers;

class Article extends \App\Controller
{

    protected function action()
    {
        //2-3. Подключили библиотеку twig/twig. Переводим шаблоны страниц сайта (фронт, не админ-панель) на Twig
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader, []);

        if (false === \App\Models\Article::findById($_GET['id'])) {
            throw new \App\Error404Exception('Ошибка 404 - не найдено:(');
        }

        echo $twig->render('/article.php',
            [ 'article' => \App\Models\Article::findById($_GET['id']) ]
        );
    }
}
