<?php

namespace App\Controllers;

use App\MultiException;

class AdminUpdate extends \App\Controller
{
    protected function action() //Редактирование новостей
    {
        $data = \App\Models\Article::findById( $_POST['update'] );

            $d = ['header' => $_POST['header'], 'text' => $_POST['text']];
            $data->fill($d);

            header('Location: /../../admin/');

        $data->save(); //сохраняем данные
    }
}