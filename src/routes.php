<?php


return [
    ['GET', '/', ['Application\Controller\HomeController', 'show'] ],
    ['GET', '/another-route', function () {
        echo 'This works too';
    }],
    ['GET', '/{slug}', ['Application\Controller\HomeController', 'show']],
];