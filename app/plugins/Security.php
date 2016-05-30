<?php

use Phalcon\Events\Event,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Acl,
    Phalcon\Acl\Adapter\Memory as AclList,
    Phalcon\Mvc\User\Plugin;
        
class Security extends Plugin
{
       
    
        public function _getAcl()
        {
              $this->persistent->destroy();
            
            if (!isset($this->persistent->acl))
            {
            
            //Create the ACL
            $acl = new AclList();

            //The default action is DENY access
            $acl->setDefaultAction(Acl::DENY);

            //Register three roles, Users are registered users, 
            //Admin is the registered SuperUser
            //and Guests are users without a defined identity
        
            $roles = array(
                'users' => new Phalcon\Acl\Role('users'),
                'guests' => new Phalcon\Acl\Role('guests'),
                'admin' => new Phalcon\Acl\Role('admin')
            );
                foreach ($roles as $role)
                {
                    $acl->addRole($role);
                }
        
        
                //Admin area resources
           $adminResources = array(
                'users' => array('index', 'new', 'edit', 'delete'),
            );
        
                foreach ($adminResources as $resource => $actions)
                {
                    $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
                } 
        
                // User area resources
            $userResources = array(
                'calendar' => array('index', 'update', 'book', 'done'),
            );
                foreach ($userResources as $resource => $actions)
                {
                    $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
                } 

                //Public area resources (frontend)
            $publicResources = array(
                'session' => array('index', 'start', 'end'),
                'notfound' => array('route404')
            );
                foreach ($publicResources as $resource => $actions)
                {
                    $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
                }
        
        
            //Grant access to public areas to all
            foreach ($roles as $role)
            {
                foreach ($publicResources as $resource => $actions)
                {
                    $acl->allow($role->getName(), $resource, '*');
                }
            }

            //Grant access to calendar area to roles Users and Admin
            foreach ($userResources as $resource => $actions)
            {
                foreach ($actions as $action)
                {
                    $acl->allow('users', $resource, $action);
                    $acl->allow('admin', $resource, $action);
                }
            }
            //Grant access to admin area to role Admin only
            foreach ($adminResources as $resource => $actions)
            {
                foreach ($actions as $action)
                {
                    $acl->allow('admin', $resource, $action);
                }
            }
            return $acl;
            }
        }
        
        public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
        {
            //Check whether the "auth" variable exists in session to define the active role
            
            $auth = $this->session->get('auth');
            if($auth && $auth['admin_role'] == 0)
            {
                $role = 'users';
            }
            else if($auth && $auth['admin_role'] == 1)
            {
                $role = 'admin';
            }
            else
            {
                $role = 'guests';
            }
        
            //Take the active controller/action from the dispatcher
            
            $controller = $dispatcher->getControllerName();
            $action = $dispatcher->getActionName();
            
            //Obtain the ACL list
            
            $acl = $this->_getAcl();
            
            //Check if the Role have access to the controller (resource)
            $allowed = $acl->isAllowed($role, $controller, $action);
            
            if($allowed != Phalcon\Acl::ALLOW) 
            {
                if($role == 'users' && $controller == 'users')
                {
                    $this->response->redirect('calendar/index/1');
                    $this->flashSession->warning("You don't have access to admin area!");
                }
                else if($role == 'guests' && $controller !='session')
                {
                        //If guests don't have access re-direct them to the start.
                        $this->response->redirect('');
                    $this->flashSession->warning('You are not logged in!');
                }
                $this->view->disable();
                //Returning "false" we tell to the dispatcher to stop the current operation
            return false;
            }
            
            
            
            
            
        }
        
        
        
        
        
}