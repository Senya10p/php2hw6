<?php

namespace App;

/**
 * Class Logger
 * @package App
 */
class Logger
{
    protected $path;

    protected $data = [];

    /**
     * Logger constructor.
     * @param $path
     * @param $text
     */
    public function __construct($path, $text)
    {
        $this->path = $path;
        $this->data = file($this->path, FILE_IGNORE_NEW_LINES);
        if (is_array($text)) {
            $text = implode('//', $text);
        }
        $this->data[] = $text;
    }

    /**
     * @return array|bool
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * @param $uri
     * @param $action
     */
    public function save($uri, $action)
    {
        $log = implode(PHP_EOL, $this->data);
        $log = $log . ' ||url: ' . $uri  . ' ||action: ' . $action . ' ||time: ' . date('Y-m-d H:i:s');

        file_put_contents($this->path, $log);
    }
}