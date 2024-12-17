<?php

namespace App\Controller;

use App\Service\HelperService;
use App\Service\TransactionService;
use App\View;
use App\Service\FileService;

class ListController
{
    public function index(string $dirPath)
    {
        return View::make('list/index', ['files' => FileService::getFiles($dirPath)]);
    }

    public function table(string $dirPath, string $placeholder, string $q)
    {
        $filePath = FileService::getFilePath($dirPath, $placeholder, $q);

        $file = fopen($filePath, 'r');

        fgetcsv($file);

        $transactions = [];
        while (($transaction = fgetcsv($file)) !== false) {
            $transactions[] = TransactionService::extractTransaction($transaction);
        }

        $totals = TransactionService::calculateTotals($transactions);

        return View::make('list/table', [
            'transactions' => $transactions,
            'totals' => $totals,
            'helpers' => new HelperService(),
        ]);
    }

    public function download(string $dirPath, string $placeholder, string $q)
    {
        $filePath = FileService::getFilePath($dirPath, $placeholder, $q);

        $fileInfo = FileService::getFileInfo($filePath);

        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $fileInfo['filename'] . '.csv');
        header('Content-Length: ' . filesize($filePath));

        readfile($filePath);
        
        exit;
    }

    public function delete(string $dirPath, string $placeholder, string $q)
    {
        $filePath = FileService::getFilePath($dirPath, $placeholder, $q);

        unlink($filePath);

        header('Location: /list?message=File+deleted+successful');
        exit;
    }
}