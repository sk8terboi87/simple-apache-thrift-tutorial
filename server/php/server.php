<?php

require_once __DIR__."/../../autoload.php";
require_once __DIR__."/../../gen-php/Example.php";

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use Thrift\Transport\TPhpStream;

require_once __DIR__."/../../gen-php/Example.php";

// Server implementation //

class ExampleHandler implements ExampleIf {

    protected $log = array();

    public function ping() {
        error_log("ping()");
    }

};

header('Content-Type', 'application/x-thrift');
$handler = new ExampleHandler();
$processor = new ExampleProcessor($handler);
$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TBinaryProtocol($transport, true, true);

// Start Server //
$transport->open();
$processor->process($protocol, $protocol);
$transport->close();
