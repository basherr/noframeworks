<?php

namespace Application;

require __DIR__ .'/../vendor/autoload.php';

error_reporting(E_ALL);

$env = 'development';


$whoops = new \Whoops\Run;

if($env === 'development') {
		
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {

	$whoops->pushHandler( function($e) {
		echo ' Friendly error page and send an email to developer';
	});
}

$whoops->register();

throw new \Exception();