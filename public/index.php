<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
//Запуск приложения, тут формируются нужные классы и зависимости и всё запускается


/**Структура приложения такая:
 * В папке app - все основные классы. Они расположены в папках Models и Http/Controllers
 * В папке Models - модели таблиц из базы данных. Когда я беру данные из базы, я обращаюсь к этим моделям
 * В папке Http/Controllers - классы, отвечающие за авторизацию(AuthController), регистрацию(RegController), создание заявки(OrderController)
 * В папке public находятся стили, картинки и javaScript + индексный файл. Стили - в public/css, картинки - в public/images, javaScript - в public/js
 * Сами html-страницы - находятся в папке resources/views. Они созданы в виде blade-шаблонов - это особые php-страницы, позволяющие использовать код внутри них в особом виде.
 * Все остальные папки и файлы тебе не нужны, но удалять их нельзя, в них находятся различные служебные файлы и классы. Настройки базы данных хранятся в переменных окружения и выводятся в файле /config/database.php
 * **/
define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';



$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
