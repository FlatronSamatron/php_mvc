<?php

namespace App\Controllers;

class Home{
    public function index(): string{
        return <<<FORM
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="receipt">
                <button type="submit">Upload</button>
            </form>
        FORM;
    }

    public function upload(): void{
        $tmpName = $_FILES['receipt']['tmp_name'];
        $fileName = $_FILES['receipt']['name'];
        var_dump($_FILES);
        move_uploaded_file($tmpName, STORAGE_PATH. '/' . $fileName);
    }
}