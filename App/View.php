<?php

namespace App;

/**
 * Class View
 * @package App
 * @property $data
 */
class View implements \Countable, \Iterator //Countable - счётный - то, что можно посчитать. Iterator - перебор
{
    protected $data = [];

    use IteratorTrait;
    use MagicTrait;

    /**
     * Метод для вывода шаблона в поток
     * @param $template
     */
    public function display($template)
    {
        foreach ($this->data as $name => $value) {
            $$name = $value;
        }
        include $template;
    }

    /**
     * Возвращает шаблон
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start(); //output bufer start - старт буферизации
        $this->display($template);
        $contents = ob_get_contents(); //получаем содержимое буфера
        ob_end_clean(); //конец и очистка буферизации

        return $contents;
    }

    /**
     * @return int
     */
    public function count() //считает количество
    {
        return count($this->data);
    }
}