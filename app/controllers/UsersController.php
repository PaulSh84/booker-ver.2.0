<?php

class UsersController extends ControllerBase

{
    
    public function indexAction()
    {
        //Setting the title of the document
        $this->tag->setTitle('Users');
        
        $users = Employees::find(['columns' => 'name, employee_id']);

        $this->view->users = $users;
    }
    
    public function editAction()
    {
    
    $employeeId = $this->dispatcher->getParams('','int')[0];
    $editUser = Employees::findFirst('employee_id = '.$employeeId.'');
        
        if($editUser)
        {
            $this->view->edit = $editUser; 
        }
        else
        {
            foreach($editUser->getMessage() as $message)
            {
                $this->flashSession->error($message);        
            }
        }
    /* Editing profile */
        
        if($this->request->hasPost('submit'))
        {
            
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $adminRole = $this->request->getPost('admin');
            
            
            $editUser->name = $name;
            $editUser->email = $email;
            $editUser->admin_role = $adminRole;
            $editUser->update();
            
            if ($editUser->update() == false)
            {
                foreach ($editUser->getMessages() as $message) 
                {
                $this->flashSession->warning($message);
                }
            }
            else
            {
                $this->flashSession->success('User info has been updated');
            }
        
            }           
        
    
    
    }
    
    public function newAction()
    {
        /* Creating new user */
        
        if($this->request->hasPost('submit'))
        {
            
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $adminRole = $this->request->getPost('admin');
            
            
            $newUser = new Employees();
            $newUser->employee_id = '';
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $this->security->hash($password);
            $newUser->admin_role = $adminRole;
            $newUser->save();
            
            if ($newUser->save() == false)
            {
                foreach ($newUser->getMessages() as $message) 
                {
                $this->flashSession->warning($message);
                }
            }
            else
            {
                $this->flashSession->success('New user has been created!');
            }
        
        }           
        
    
    
    }
    
    public function deleteAction()
    {   
        /* Removing the user */
        
        if($this->request->isGet())
        {
            $userId = $this->dispatcher->getParams('','int')[0];
            
            $user = Employees::findFirst($userId);
            $user->delete();
            
          if (!$user) 
          {
            if (!$user->delete())
            {
                foreach ($user->getMessages() as $message)
                {
                    $this->flashSession->warning($message);
                }
            }
          }
            else
            {
              $this->flashSession->success('User has been removed!');
            }
        }
    }
 
}