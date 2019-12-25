<?php

spl_autoload_register(function ($classname)
{
    # list all the class directories in the array
    $array_paths = [
        '/models/',
        '/components/'
    ];

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $classname .'.php';
        if (is_file($path)) {
            include_once($path);
        }
    }
});
?>
