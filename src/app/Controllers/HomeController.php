<?php

namespace App\Controllers;

use App\View;

class HomeController{
    public function index(): View{
        return View::make('index', ['foo' => 'bar']);
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment/pdf; fileName="myfile.pdf"');
    }

    public function upload(): void{
        $tmpName = $_FILES['receipt']['tmp_name'];
        $fileName = $_FILES['receipt']['name'];

        move_uploaded_file($tmpName, STORAGE_PATH. '/' . $fileName);

        header('Location: /', );
        exit;
    }
}