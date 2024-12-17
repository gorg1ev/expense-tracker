<?php

namespace App\Controller;

use App\Exceptions\FileMustBeCSV;
use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function upload()
    {
        $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if ($fileExtension !== 'csv') {
            throw new FileMustBeCSV();
        }

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        header('Location: /list');

        exit;
    }
}