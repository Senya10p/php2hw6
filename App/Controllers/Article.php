<?php

namespace App\Controllers;

class Article extends \App\Controller
{

    protected function action()
    {
        //2-3. Подключили библиотеку twig/twig. Переводим шаблоны страниц сайта (фронт, не админ-панель) на Twig
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
        $twig = new \Twig_Environment($loader, []);

        if ( isset($_GET['id']) ) { //проверяем на существование

            $this->view = new \App\View();
            $this->view->article = \App\Models\Article::findById( $_GET['id'] );

            if ( false === $this->view->article) {
                throw new \App\Error404Exception('Ошибка 404 - не найдено:(');
            }
        }

        $twig->display('/article.php',
            [ 'article' => \App\Models\Article::findById($_GET['id']) ]
        );
    }
}
