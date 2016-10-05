<?php

include './router/_head.php';

$router->addRoutes([
    ['GET', '/', 'Controller\StaticPages#home'],
    ['GET', '/sample/[:id]', 'Controller\StaticPages#sampleVariable'],
    ['GET', '/sample', 'Controller\StaticPages#sample'],
    ['GET', '/users', 'Controller\Users#all'],
    ['GET', '/users/add', 'Controller\Users#add'],
    ['POST', '/users/add', 'Controller\Users#create'],
    ['GET', '/users/[:id]', 'Controller\Users#one'],
    ['GET', '/users/[:id]/edit', 'Controller\Users#edit'],
    ['POST', '/users/[:id]', 'Controller\Users#update']
]);

include './router/_feet.php';
