<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Router
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
    protected $notAllowedURL = [
        'login',
        'signup'
    ];

    private function routeApp($url)
    {
        //controllers classes
        $fileController = "../app/controllers/" . strtolower($url[0]) . ".php";
        if (file_exists($fileController)) {
            if (in_array($url[0], $this->notAllowedURL) && !empty($_SESSION['url_address'])) {
                $url[0] = 'home';
            }
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }else {
            http_response_code(404);
            $this->controller = "_404";
            require_once "../app/controllers/_404.php";
        }
        require_once  "../app/controllers/" .$this->controller . ".php";
        $this->controller = new $this->controller();

        //methods
        if(isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = strtolower($url[1]);
                unset($url[1]);
            }
        }
        //parameters
        $url = array_values($url);
        $this->params = count($url) > 0 ? $url : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getRouterURL($url)
    {
        $this->routeApp($url);
    }
}