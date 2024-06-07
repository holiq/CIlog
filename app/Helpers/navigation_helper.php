<?php

if (!function_exists('active_nav')) {
    function active_nav($routes, $class = 'active')
    {
        $controllerNamespace = \Config\Services::router()->controllerName();
        $methodName = \Config\Services::router()->methodName();

        $controllerArray = explode('\\', $controllerNamespace);
        $simpleControllerName = implode('\\', array_slice($controllerArray, 3));

        $currentRoute = $simpleControllerName . '::' . $methodName;

        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (
                    $route === $currentRoute
                ) {
                    return $class;
                }
            }
        } else {
            if ($routes === $currentRoute) {
                return $class;
            }
        }

        return '';
    }
}
