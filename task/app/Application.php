<?php
namespace App;

class Application{

    public Router $router;
    public Request $request;
    public static Application $app;

    public function __construct(){
        $this->router = new Router();
        $this->request = new Request();

        self::$app = $this;
    }

    public function run(){
        echo $this->router->resolve();
    }
}