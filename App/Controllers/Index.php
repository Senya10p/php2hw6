<?php

namespace App\Controllers;

class Index extends \App\Controller
{
    protected function action()
    {
        //2-3. Подключили библиотеку twig/twig. Переводим шаблоны страниц сайта (фронт, не админ-панель) на Twig
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
        $twig = new \Twig_Environment($loader, []);

        $twig->display('/index.php',
            [ 'article' => \App\Models\Article::findAll() ]
        );
    }
}
