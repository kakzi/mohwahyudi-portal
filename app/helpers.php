<?php

if (!function_exists('is_active_route')) {
    function is_active_route($routeName, $locale = null) {
        $currentLocale = app()->getLocale();
        $locale = $locale ?? $currentLocale;
        
        $currentRoute = request()->route();
        $currentRouteName = $currentRoute ? $currentRoute->getName() : '';
        
        return $currentRouteName === $routeName && $currentLocale === $locale;
    }
}