<?php

//Thrift  libraries
$thirftSource = '/opt/apache_thrift/thrift-0.9.1';
require_once $thirftSource.'/lib/php/lib/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

// $GEN_DIR = realpath(dirname(__FILE__).'/..').'/gen-php';
$GEN_DIR = __DIR__.'/gen-php';

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', $thirftSource.'/lib/php/lib');
$loader->register();