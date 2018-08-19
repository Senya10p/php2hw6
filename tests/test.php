<?php
// файл test.php для проверки работоспособности

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$test = $db->execute( 'UPDATE news SET header = :h1 WHERE header = :h2 ', [':h1' => 'Заголовок 122' , ':h2' => 'Заголовок 1'] ); //3. Проверяем работоспособность
var_dump($test);

$data = \App\Models\Article::findById(1); //тестируем поиск по id
var_dump($data);