<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit76c1871edaebd32eb376c814e5369495
{
    public static $classMap = array (
        'app\\Authentication' => __DIR__ . '/../..' . '/app/controller/dynamic/authentication.php',
        'app\\Cabinet' => __DIR__ . '/../..' . '/app/controller/dynamic/cabinet.php',
        'app\\DB' => __DIR__ . '/../..' . '/app/model/static/db.php',
        'app\\Encryption' => __DIR__ . '/../..' . '/app/model/static/encryption.php',
        'app\\Main' => __DIR__ . '/../..' . '/app/controller/dynamic/main.php',
        'app\\ModelMain' => __DIR__ . '/../..' . '/app/model/dynamic/main.php',
        'app\\ModelTranslator' => __DIR__ . '/../..' . '/app/model/dynamic/translator.php',
        'app\\ModelUser' => __DIR__ . '/../..' . '/app/model/dynamic/user.php',
        'app\\Route' => __DIR__ . '/../..' . '/app/controller/static/routing.php',
        'app\\View' => __DIR__ . '/../..' . '/app/controller/static/view.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit76c1871edaebd32eb376c814e5369495::$classMap;

        }, null, ClassLoader::class);
    }
}