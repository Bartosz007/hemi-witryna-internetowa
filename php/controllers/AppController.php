<?php

class AppController {

    private static string $ext = ".html";

    protected function render(string $template = null){
        $templatePath = "public/pages/".$template.self::$ext;

        $out="File don't exists";

        if(file_exists($templatePath)){
            ob_start();
            include $templatePath;
            $out = ob_get_clean();
        }

        print $out;
    }

}
