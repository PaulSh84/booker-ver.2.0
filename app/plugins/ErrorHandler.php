<?php

use Phalcon\Mvc\Dispatcher\Exception,
    Phalcon\Mvc\User\Plugin;

class ErrorHandler extends Plugin
{
    
    /**
     * This action is executed before execute any action in the application
     * If a page is not found throws an error
     
     @param \Phalcon\Events\Event $event
     * @param \Phalcon\Mvc\Dispatcher $dispatcher
     * @param \Phalcon\Mvc\Dispatcher\Exception $exception
     * @throws \Phalcon\Mvc\Dispatcher\Exception
     * @return \Phalcon\Mvc\View
     */
    
    public function beforeException($event, $dispatcher, $exception)
    {
        if($exception instanceof Exception)
        {
            $dispatcher->forward(
                [
                    'controller' => 'notfound',
                    'action' => 'route404'
                ]
            
            );
            return false;
        }
        return $event->isStopped();
    }
    
    
}