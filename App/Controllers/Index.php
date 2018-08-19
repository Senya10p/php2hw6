<?php

namespace App\Controllers;

class Index extends \App\Controller
{
    protected function action()
    {
        //2-3. Подключили библиотеку twig/twig. Переводим шаблоны страниц сайта (фронт, не админ-панель) на Twig
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader, []);

        echo $twig->render('/index.php',
            [ 'article' => \App\Models\Article::findAll() ]
        );
    }
}
