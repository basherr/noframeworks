<?php


$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define( 'Http\HttpRequest', [
		':get' => $_GET,
	    ':post' => $_POST,
	    ':cookies' => $_COOKIE,
	    ':files' => $_FILES,
	    ':server' => $_SERVER,
	]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('Application\Template\Renderer', 'Application\Template\TwigRenderer');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

$injector->delegate('Twig_Environment', function () use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});

$injector->define('Application\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->share('Application\Page\FilePageReader');

$injector->alias('Application\Page\PageReader', 'Application\Page\FilePageReader');

$injector->alias('Application\Template\FrontendRenderer', 'Application\Template\FrontendTwigRenderer');

$injector->alias('Application\Menu\MenuReader', 'Application\Menu\ArrayMenuReader');
$injector->share('Application\Menu\ArrayMenuReader');

return $injector;