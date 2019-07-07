<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'app\\Authentication' => $baseDir . '/app/controller/dynamic/authentication.php',
    'app\\Cabinet' => $baseDir . '/app/controller/dynamic/cabinet.php',
    'app\\DB' => $baseDir . '/app/model/static/db.php',
    'app\\Encryption' => $baseDir . '/app/model/static/encryption.php',
    'app\\Main' => $baseDir . '/app/controller/dynamic/main.php',
    'app\\ModelMain' => $baseDir . '/app/model/dynamic/main.php',
    'app\\ModelTranslator' => $baseDir . '/app/model/dynamic/translator.php',
    'app\\ModelUser' => $baseDir . '/app/model/dynamic/user.php',
    'app\\Route' => $baseDir . '/app/controller/static/routing.php',
    'app\\View' => $baseDir . '/app/controller/static/view.php',
);