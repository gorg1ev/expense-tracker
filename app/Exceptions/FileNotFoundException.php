<?php

namespace App\Exceptions;

class FileNotFoundException extends \Exception
{
    protected $message = 'File Not Found!';
}