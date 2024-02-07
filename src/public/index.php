<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new App\Router();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';

/**
 * Чтобы получить полное имя класса ClassName, используйте ClassName::class
 * для вызова call_user_func класса нужно передать массив [названия класса, метод] метод должен быть static
 * если обьявить класс перед вызовом, метод можно делать обычным 
 * call_user_func_array ([названия класса, метод], [аргументы])
 */

try{
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
        ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

    // $router->register('/', function(){
    //     echo "Home";
    // });

    // $router->register('/invoices', function(){
    //     echo "Invoices";
    // });

    // echo "<pre>";
    // print_r($router->routes());
    // echo "</pre>";

    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

    // var_dump([App\Classes\Home::class, 'index'], [App\Classes\Invoice::class, 'index']);
} catch (\App\Exceptions\RouteNotFoundException $e){
    header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo \App\View::make('error/404');
}

