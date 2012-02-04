<?php
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'symn0506rapc3tjr7q40ndbyzp2f0jxy';
    $apiUserId = '15470';
    $namespace = 'report';
    $method = 'getUsagePerDay';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $companyId = 'acmeinc';
    $dateFrom = '2012-02-01';
    $dateTo = '2012-02-31';
    $zoneId = '30044';

    $f=new xmlrpcmsg("$namespace.$method", array(
    	php_xmlrpc_encode($apiUserId),
    	php_xmlrpc_encode($authString),
    	php_xmlrpc_encode($cur),
    	php_xmlrpc_encode($companyId),
    	php_xmlrpc_encode($dateFrom),
    	php_xmlrpc_encode($dateTo),
    	php_xmlrpc_encode($zoneId),
    						));

    $c=new xmlrpc_client("/xmlrpc/report", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
