<?php

namespace App\Controllers;

class AdminDel extends \App\Controller
{
    protected function action() //Удаление новостей
    {
        $data = \App\Models\Article::findById( $_POST['del'] );
        $data->delete();

        header('Location: /../../admin/');
    }

}