<?php

namespace App\Controllers;

use App\View;

class HomeController{
    public function index(): View{
        return View::make('index', ['foo' => 'bar']);
    }

    public function upload(): void{
        $tmpName = $_FILES['receipt']['tmp_name'];
        $fileName = $_FILES['receipt']['name'];
        var_dump($_FILES);
        move_uploaded_file($tmpName, STORAGE_PATH. '/' . $fileName);
    }
}