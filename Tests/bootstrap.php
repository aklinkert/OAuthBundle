<?php

if (!file_exists($file = __DIR__ . '/../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run test suite.');
}

$autoload = require_once $file;

spl_autoload_register(
    function ($class) {
        if (0 === strpos($class, 'APinnecke\\Bundle\\OAuthBundle')) {
            $path = __DIR__ . '/../' . implode('/', array_slice(explode('\\', $class), 3)) . '.php';
            if (!stream_resolve_include_path($path)) {
                return false;
            }
            require_once $path;

            return true;
        }
    }
);
