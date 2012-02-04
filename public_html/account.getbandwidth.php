<?php
    date_default_timezone_set('America/Los_Angeles');
    include("/lib/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'symn0506rapc3tjr7q40ndbyzp2f0jxy';
    $apiUserId = '15470';
    $namespace = 'account';
    $method = 'getBandwidth';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $from = '2011-05-10';
    $to = '2011-05-11';
    $i = 0;

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($from),
    php_xmlrpc_encode($to),
    ));

    $c=new xmlrpc_client("/xmlrpc/account", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
