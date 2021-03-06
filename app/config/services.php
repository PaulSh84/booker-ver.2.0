<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;


/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

    $view = new View();
    
    $view->disableLevel(array(
        View::LEVEL_MAIN_LAYOUT => true
    ));

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        "charset" => $config->database->charset
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

 /**
    * Register the flash service with custom CSS classes
    */

    $di->set('flashSession', function(){
    $flash = new \Phalcon\Flash\Session(array(
        'error' => 'alert alert-error',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-danger',
    ));
    return $flash;
});

  /**
 * Start the router 
 */  
$di->set('router', function (){
    return require __DIR__ . '/routes.php';
});

/**
 * Start security Service. 
 */  

$di->set('security', function(){

    $security = new Phalcon\Security();

    //Устанавливаем фактор хеширования в 12 раундов
    $security->setWorkFactor(12);

    return $security;
}, true);
/**
*   Taking control of the Dispatcher to verify, where user has access to.
*/
$di->set('dispatcher', function() use ($di) {
    $dispatcher = new Phalcon\Mvc\Dispatcher();
    
     //Obtain the standard eventsManager from the DI
    $eventsManager = $di->getShared('eventsManager');
    
    //Instantiate the Security plugin
    $security = new Security($di);
    
    //Listen for events produced in the dispatcher using the Security plugin
    $eventsManager->attach('dispatch', $security);
    
    // Attach the Error handler
    $errorHandler = new ErrorHandler();
    
    $eventsManager->attach('dispatch', $errorHandler);
        
    $dispatcher = new Phalcon\Mvc\Dispatcher();

    //Bind the EventsManager to the Dispatcher
    $dispatcher->setEventsManager($eventsManager);
    
    return $dispatcher;
});
