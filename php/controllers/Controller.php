<?php

class Controller {

    private $request;
    private static string $ext = ".php";


    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet():bool
    {
        return $this->request === 'GET';
    }

    protected function isPost():bool
    {
        return $this->request === 'POST';
    }


    protected function render(string $template = null, array $variables = []){

        $path = "public/pages/".$template.self::$ext;
        $out = "File don't exists";

        if(file_exists($path)){
            extract($variables);

            ob_start();
            include $path;
            $out = ob_get_clean();
        }

        print $out;
    }

}
