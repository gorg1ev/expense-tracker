<?php

namespace App;

use App\Exceptions\FileMustBeCSV;
use App\Exceptions\FileNotFoundException;
use app\Exceptions\RouteNotFoundException;

class App
{

    public function __construct(protected Router $router, protected array $request)
    {
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        } catch (FileMustBeCSV) {
            http_response_code(400);

            header('Location: /?error=The+uploaded+file+type+is+not+supported');
        } catch (FileNotFoundException) {
            http_response_code(404);

            header('Location: /list?error=File+not+found');
        }
    }
}