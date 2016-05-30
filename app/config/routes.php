<?php
    
$router = new \Phalcon\Mvc\Router(false);

//removing extra slashes

$router->removeExtraSlashes(true);
    
$router->add("/", array(
    'controller' => 'session',
    'action' => 'index'
));
  
$router->add("/session/start", array(
    'controller' => 'session',
    'action' => 'start'
));

$router->add("/session/end", array(
    'controller' => 'session',
    'action' => 'end'
));
    $router->add("/calendar/index/:params", array(
    'controller' => 'calendar',
    'action' => 'index',
    'params' => 1    
));

    $router->add("/calendar/index", array(
    'controller' => 'notfound',
    'action' => 'route404',
));

$router->add("/calendar/book/:params", array(
    'controller' => 'calendar',
    'action' => 'book',
     'params' => 1
));

$router->add("/calendar/book", array(
    'controller' => 'notfound',
    'action' => 'route404',
  
));

$router->add("/calendar/update/:params", array(
    'controller' => 'calendar',
    'action' => 'update',
     'params' => 1
));

$router->add("/calendar/update", array(
    'controller' => 'notfound',
    'action' => 'route404',
    
));

$router->add("/calendar/done", array(
    'controller' => 'calendar',
    'action' => 'done'
));

$router->add("/users/index", array(
    'controller' => 'users',
    'action' => 'index',
     
));

$router->add("/users/edit/:params", array(
    'controller' => 'users',
    'action' => 'edit',
     'params' => 1
     
));

$router->add("/users/edit", array(
    'controller' => 'notfound',
    'action' => 'route404',
     
     
));

$router->add("/users/new", array(
    'controller' => 'users',
    'action' => 'new',
          
));

$router->add("/users/delete/:params", array(
    'controller' => 'users',
    'action' => 'delete',
    'params' => 1
          
));

$router->add("/users/delete", array(
    'controller' => 'notfound',
    'action' => 'route404',
      
));


    return $router;
?>
