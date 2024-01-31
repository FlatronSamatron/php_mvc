<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new App\Router();

/**
 * Чтобы получить полное имя класса ClassName, используйте ClassName::class
 * для вызова call_user_func класса нужно передать массив [названия класса, метод] метод должен быть static
 * если обьявить класс перед вызовом, метод можно делать обычным 
 * call_user_func_array ([названия класса, метод], [аргументы])
 */

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->get('/invoices', [App\Classes\Invoice::class, 'index']) 
    ->get('/invoices/create', [App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoice::class, 'store']);

// $router->register('/', function(){
//     echo "Home";
// });

// $router->register('/invoices', function(){
//     echo "Invoices";
// });
echo "<pre>";
print_r($router->routes());
echo "</pre>";

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

// var_dump([App\Classes\Home::class, 'index'], [App\Classes\Invoice::class, 'index']);

