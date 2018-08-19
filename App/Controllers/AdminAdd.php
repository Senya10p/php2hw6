<?php

namespace App\Controllers;

use App\Models;

class AdminAdd extends \App\Controller
{
    protected function action() //Добавление новостей
    {
        if ( '' !== $_POST['header'] ) { //проверка введен ли заголовок
            if ( '' !== $_POST['text'] ) { //введён ли текст статьи

                $data = new Models\Article();

                $d = ['header' => $_POST['header'], 'text' => $_POST['text']];
                $data->fill($d); //проверка валидности введённых данных

                $data->save(); //добавляет новую запись
            }
        }
        header('Location: /../../admin/');
    }

}