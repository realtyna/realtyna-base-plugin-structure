<?php

if (!function_exists('d')) {
    function d()
    {
        call_user_func_array('dump', func_get_args());
    }
}
/**
 * Dump variables and die.
 */
if (!function_exists('dd')) {
    function dd()
    {
        call_user_func_array('dump', func_get_args());
        die();
    }
}