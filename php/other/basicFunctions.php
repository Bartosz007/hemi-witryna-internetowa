<?php

require_once __DIR__ . "/../constants/SETTINGS.php";

function validate(int $size, string $type): bool{

    if($size > MAX_FILE_SIZE){
        return false;
    }

    if(!isset($type) || !in_array($type,SUPPORTED_TYPES)){
        return false;
    }

    return true;
}