<?php

namespace app\core;

use function app\helpers\dd;

class RouterCore
{


    private $uri;
    private $method;
    private $getArr = [];


    public function __construct()
    {
        $this->initialize();
        require_once '../app/config/router.php';
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD']; //request method
        $uri = $_SERVER['REQUEST_URI']; //request uri (without query string)

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);
        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));
    }

    private function normalizeURI($string)
    {
        return array_values(array_filter($string));

    }

    private function get($router, $call)
    {

        $this->getArr[] = [
            'router' => $router,
            'call' => $call,
        ];

    }

    private function executeGet(){
        foreach ($this->getArr as $get){
            $r = substr($get['router'], 1);
            //echo $r . '-' . $this->uri . '</br>';
            if(substr($r, -1) == '/'){
                $r = substr($r, 0 ,-1);
                dd($r);
            }

            if ($r == $this->uri){
                if (is_callable($get['call'])){
                    $get['call']();
                    break;
                }
            }
        }
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':

                break;



        }
    }

}
