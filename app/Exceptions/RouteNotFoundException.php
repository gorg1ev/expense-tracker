<?php

namespace app\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route Not Found!';
}