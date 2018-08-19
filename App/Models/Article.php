<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model //Создаём класс Article
{

    public $header;
    public $text;

    public $author_id; //Добавляем поле

    protected static $table = 'news'; //используем описание защищённого статического свойства

    public static function findLast(int $lim) //создаём описание метода для поиска последних записей из таблицы news
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $lim;

        return $db->query( $sql, static::class );
    }

    /**
     * принимает имя недоступного свойства и если не пустое, возвращает значение по id
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        if ('author' === $name ) {
            if ( !empty($this->author_id) ) {

                return Author::findById($this->author_id);
            }
        }
    }

    /**
     * Проверка существования недоступного свойства
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if ('author' === $name ) {

            return isset($this->author_id);
        }
    }

    public function setHeader($value)
    {
        if (strlen($value) < 3) {
            throw new \Exception('Ошибка! Заголовок должен иметь не меньше 3-х символов');
        }
        $this->header = $value;
    }

    public function setText($value)
    {
        if (strlen($value) < 3) {
            throw new \Exception('Ошибка! Текст статьи должен иметь не меньше 3-х символов');
        }
        $this->text = $value;
    }
}