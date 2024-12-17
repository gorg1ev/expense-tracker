<?php

namespace App\Service;

use App\Exceptions\FileNotFoundException;

class FileService
{
    public static function getFiles(string $dirPath): array
    {
        $files = [];

        foreach (scandir($dirPath) as $file) {
            if (is_dir($file)) {
                continue;
            }

            $files[] = static::getFileInfo($dirPath . DIRECTORY_SEPARATOR . $file);
        }

        return $files;
    }

    public static function getFileInfo(string $path): array
    {
        $file = pathinfo($path);

        return [
            'filename' => $file['filename'],
            'filesize' => filesize($path) . ' B'
        ];
    }

    public static function getFilePath(string $dirPath, string $placeholder, string $q): string
    {
        $params = [];
        parse_str($q, $params);

        $docFile = $dirPath . DIRECTORY_SEPARATOR . $params[$placeholder] . '.csv';

        if (!file_exists($docFile)) {
            throw new FileNotFoundException();
        }

        return $docFile;
    }
}