<?php

namespace App\Controllers;

/**
 * Class Exceptions
 * @package App\Controllers
 */
class Exceptions extends \App\Controller
{
    public $errors;

    protected function action()
    {
        $this->view->errors = $this->errors;
        $this->view->display(__DIR__ . '/../../templates/error.php');
    }

}