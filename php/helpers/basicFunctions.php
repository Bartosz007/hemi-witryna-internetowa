<?php

require_once "SETTINGS.php";

function validate(array $file): bool{

    if($file["size"] > MAX_FILE_SIZE){
        return false;
    }

    if(!isset($file["type"]) || !in_array($file["type"],SUPPORTED_TYPES)){
        return false;
    }

    return true;
}