<?php

if (! function_exists('isOpen')) {

    function isOpen($href, $class = 'menu-open')
    {
        return $class = (strpos(Route::currentRouteName(), $href) === 0 ? $class : '');
    }
}