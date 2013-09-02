<?php
require_once __DIR__."/../../autoload.php";
require_once __DIR__."/../../gen-php/Example.php";

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

$serverHost    = "localhost";
$serverPort    = "10000";
$phpServerPath = "/server.php";

try {

    // Open an HTTP Connection //
    $socket = new THttpClient($serverHost, $serverPort, $phpServerPath);
    $transport = new TBufferedTransport($socket, 1024, 1024);
    $protocol = new TBinaryProtocol($transport);

    // Set client //
    $client = new ExampleClient($protocol);

    // Open The Connection //
    $transport->open();

    // Call Our First Method //
    $client->ping();


} catch (TException $tx) {
    print 'Something went wrong: '.$tx->getMessage()."\n";
}

