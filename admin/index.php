<?php

require __DIR__ . '/../autoload.php';
// Точка входа для админ-панели
$uri = $_SERVER['REQUEST_URI']; //в Apach преобразование адресов
$parts = explode('/', $uri);

$name = !empty($parts[1]) ? ucfirst($parts[1]) : 'Admin';

if ( isset( $_POST['header'], $_POST['text'] ) ) {
    $name = 'AdminAdd';
}
if ( isset( $_POST['update'] ) ) {
    $name = 'AdminUpdate';
}
if ( isset( $_POST['del'] ) ) {
    $name = 'AdminDel';
}
$class = '\App\Controllers\\' . $name; //роутер

try {
    $ctrl = new $class;
    $ctrl->dispatch();
} catch (\App\MultiException $errors) { //ловим исключения

    $ctrl = new \App\Controllers\Exceptions();
    $ctrl->errors = $errors->all();
    $ctrl->dispatch();
} catch (\App\DbException | \App\Error404Exception $errors) {

    $ctrl = new \App\Controllers\Exceptions();
    $ctrl->errors = $errors->getMessage();
    $ctrl->dispatch();
} finally {
    if (isset($errors)) {
        $log = new \App\Logger(__DIR__ . '/../log.txt', $ctrl->errors);
        $log->save($_SERVER['REQUEST_URI'], $name);
    }
}
