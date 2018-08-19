<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config // Добавляем класс App\Config.
{
    public $data;

    protected static $conf;

    protected function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }

    public static function instance() // Делаем класс синглтоном
    {
        if ( null === self::$conf ) {

            self::$conf = new self;
        }
        return self::$conf;
    }
}