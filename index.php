<?php

require __DIR__ . '/autoload.php';
//Точка входа
$uri = $_SERVER['REQUEST_URI']; //в Apach преобразование адресов
$parts = explode('/', $uri);

if ($parts[1] == 'article') {
    if ( false == strstr($parts[2], '?id=') ) {
        header('Location: /');
    }
}

if ( $parts[1] == 'admin' ) { //если в начале admin
    $name = ucfirst($parts[1]);

} else {
    $name = !empty($parts[1]) ? ucfirst($parts[1]) : 'Index'; //выбираем один из двух вариантов //роутер
    $path = __DIR__ . '/App/Controllers/' . $name . '.php';

    if ( false == file_exists($path) ) {
        header('Location: /');
    }
}

$class = '\App\Controllers\\' . $name; //роутер

try {
    $ctrl = new $class;
    $ctrl->dispatch();
} catch (\App\DbException | \App\Error404Exception $error) { //2. Ловим исключения

    $ctrl = new \App\Controllers\Exceptions();
    $ctrl->errors = $error->getMessage();
    $ctrl->dispatch();
} finally {
    if (isset($error)) {
        $log = new \App\Logger(__DIR__ . '/log.txt', $error->getMessage());
        $log->save($_SERVER['REQUEST_URI'], $name);
    }
}
