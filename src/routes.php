<?php


return [
    ['GET', '/', ['Application\Controller\HomeController', 'show'] ],
    ['GET', '/another-route', function () {
        echo 'This works too';
    }],
];