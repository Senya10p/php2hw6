<?php

namespace App;

/**
 * Trait IteratorTrait
 * @package App *
 *
 */
trait IteratorTrait
{

    public function rewind() //Перемотать итератор на первый элемент
    {
        reset($this->data);
    }

    public function valid() //Проверяет корректность текущей позиции
    {
        return null !== key($this->data);
    }

    public function current() //Возврат текущего элемента
    {
        return current($this->data);
    }

    public function key() //Возврат ключа текущего элемента
    {
        return key($this->data);
    }

    public function next() //Переход к следующему элементу
    {
        next($this->data);
    }

}