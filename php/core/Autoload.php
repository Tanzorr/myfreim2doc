<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 25.07.19
 * Time: 16:39
 */

function __autoload($class_name)
{
    // Массив папок, в которых могут находиться необходимые классы
    $array_paths = array(
        '/app/models/',
        '/app/components/',
        '/app/controllers/',
        '/core/',
    );
    // Проходим по массиву папок
    foreach ($array_paths as $path) {
        // Формируем имя и путь к файлу с классом
        $path = ROOT . $path . $class_name . '.php';
        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            include_once $path;
        }
    }
}