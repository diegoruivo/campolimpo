<?php

if (! function_exists('limitText')) {

    function limitText($description, $limit){
        $description = substr($description, 0, strrpos(substr($description, 0, $limit), ' ')) . '...';
        return $description;
    }

}


