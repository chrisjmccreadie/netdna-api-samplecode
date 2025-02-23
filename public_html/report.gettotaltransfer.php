<?php
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'api-key';
    $apiUserId = 'user-id';
    $namespace = 'report';
    $method = 'getTotalTransfer';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $zoneId = 'zoneid';
    $type = '1'; //1=today, 2=current hour, 3=date range

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($zoneId),
    php_xmlrpc_encode($type),
    ));

    $c=new xmlrpc_client("/xmlrpc/report", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
