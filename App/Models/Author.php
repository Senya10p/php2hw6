<?php

namespace App\Models;


use App\Model;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    protected static $table = 'authors';

    public $name;

}