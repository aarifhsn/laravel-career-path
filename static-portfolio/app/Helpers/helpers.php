<?php

if (!function_exists('setActive')) {
    function setActive($route)
    {
        return request()->is($route) ? 'active' : '';
    }
}
