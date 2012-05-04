<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

require_once 'vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'SimpleDOM' => 'src/',
    'Test' => realpath('.'),
));
$loader->register();
