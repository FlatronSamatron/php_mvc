<?php

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $viewPat = VIEW_PATH . '/' . $this->view . '.php';

        if(!file_exists($viewPat)){
            throw new ViewNotFoundException();
        }

        //extract — Импортирует переменные массива в текущую таблицу символов
        //для того что б потом обращатся просто к переменной $foo вместо $this->foo
        //        foreach ($this->params as $key => $value){
        //            $$key = $value;
        //        }
        extract($this->params);

        ob_start();
        include $viewPat;
        //ob_get_clean - Получает содержимое активного буфера вывода и выключает его
        return (string) ob_get_clean();
    }

    /* __toString позволяет классу решать, как он должен реагировать при преобразовании в строку. Например, что вывести при выполнении echo $obj
     * при вызове метода make превращаем его в (string) и вызываем __toString или возвращаем тип View
     * */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }

}