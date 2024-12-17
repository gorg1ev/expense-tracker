<?php

namespace App\Exceptions;

class FileMustBeCSV extends \Exception
{
    protected $message = 'File Must Be .csv';
}